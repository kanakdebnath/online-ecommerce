<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
 
class BkashController extends Controller
{
    private $base_url;
    public function __construct()
    {
        // if(get_option('bkash_sandbox', 1)){
        //     $this->base_url = "https://checkout.sandbox.bka.sh/v1.2.0-beta/";
        // }
        // else {
        //     $this->base_url = "https://checkout.pay.bka.sh/v1.2.0-beta/";
        // }

        $this->base_url = "https://checkout.sandbox.bka.sh/v1.2.0-beta/";
    }

    

    public function pay(){
        $amount = 0;
        $order = Order::findOrFail(Session::get('order_id'));
        $amount = round($order->grand_total);

        $request_data = array('app_key'=> env('BKASH_CHECKOUT_APP_KEY'), 'app_secret'=>env('BKASH_CHECKOUT_APP_SECRET'));

        $url = curl_init($this->base_url.'checkout/token/grant');
        $request_data_json=json_encode($request_data);

        $header = array(
                'Content-Type:application/json',
                'username:'.env('BKASH_CHECKOUT_USER_NAME'),
                'password:'.env('BKASH_CHECKOUT_PASSWORD')
                );
        curl_setopt($url,CURLOPT_HTTPHEADER, $header);
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $request_data_json);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        $resultdata = curl_exec($url);
        curl_close($url);

        $token = json_decode($resultdata)->id_token;

        Session::put('bkash_token', $token);
        Session::put('payment_amount', $amount);

        return view('frontend.bkash.index');
    }

    public function checkout(Request $request){
        $auth = Session::get('bkash_token');

        $callbackURL = route('home');

        $requestbody = array(
            'amount' => Session::get('payment_amount'),
            'currency' => 'BDT',
            'intent' => 'sale'
        );
        $url = curl_init($this->base_url.'checkout/payment/create');
        $requestbodyJson = json_encode($requestbody);

        $header = array(
            'Content-Type:application/json',
            'Authorization:' . $auth,
            'X-APP-Key:'.env('BKASH_CHECKOUT_APP_KEY')
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $resultdata = curl_exec($url);
        curl_close($url);

        return $resultdata;
    }

    public function excecute(Request $request){
        $paymentID = $request->paymentID;
        $auth = Session::get('bkash_token');

        $url = curl_init($this->base_url.'checkout/payment/execute/'.$paymentID);
        $header = array(
            'Content-Type:application/json',
            'Authorization:' . $auth,
            'X-APP-Key:'.env('BKASH_CHECKOUT_APP_KEY')
        );

        curl_setopt($url,CURLOPT_HTTPHEADER, $header);
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        $resultdata = curl_exec($url);
        curl_close($url);

        return $resultdata;
    }

    public function success(Request $request){
        $checkoutController = new CheckoutController;
        return $checkoutController->checkout_done(Session::get('order_id'), $request->payment_details);
    }
}
