<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request){

        $order = new Order;
        $order->user_id = Auth::user()->id;

        // Invoice Id 

        $abc = DB::table('orders')->count();
        $abcd = date('Ym').$abc;
        $invoice_id = "#MM".$abcd;
        $order->invoice_id = $invoice_id;
        $order->payment_type = $request->payment_option;


        $address = [];
        $address['billing_address']= $request->billing_address;
        $address['city']= $request->city;
        $address['zipcode']= $request->zipcode;
        $address['phone']= $request->phone;
        $address['email']= $request->email;
        $address['cname']= $request->cname;

        $order->address = json_encode($address);
        $order->delivery_status = 'Pending';
        $order->payment_status = 'Unpaid';


        // $grandtotal = 0;
        // foreach (Cart::getContent() as  $value) {
        //     $grandtotal += $value['price']*$value[''] 
        // }

        $grandtotal =  \Cart::getSubTotal();

        $order->grand_total = $grandtotal;


        if ($order->save()) {

            foreach (\Cart::getContent() as  $value) {
                $order_details = new OrderDetail();
                $order_details->order_id = $order->id;
                $order_details->product_id = $value['id'];
                $order_details->qty = $value['quantity'];
                $order_details->price = $value['price'];
                $order_details->save();
            }
        }
    }
}
