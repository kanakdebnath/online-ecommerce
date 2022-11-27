<?php

namespace App\Http\Controllers\Admin;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function order_submit(Request $request){
        
        // $subtotal = 0;
        // foreach (Cart::getContent() as $key => $value) {
        //     # code...
        // }

        if(Auth::check()){


        if($request->payment_option != null){
            $OrderController = new OrderController;
            $OrderController->store($request);

            if($request->payment_option == 'bank'){
                    echo 'bank';
            }elseif($request->payment_option == 'paypal'){
                echo 'bank';
            }else{

                $details =  array(
                    'name' => $request->fname,
                    'body' => 'Thanks for your Order. I will contact you soon.'
                );

                \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));
            
                return redirect()->route('dashboard')->with('messege','Order Place Successfully');
            }
        }
    }else{
        return redirect()->route('login');
    }
    }
}
