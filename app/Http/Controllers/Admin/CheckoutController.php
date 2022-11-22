<?php

namespace App\Http\Controllers\Admin;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function order_submit(Request $request){
        
        // $subtotal = 0;
        // foreach (Cart::getContent() as $key => $value) {
        //     # code...
        // }

        

        if($request->payment_option != null){
            $OrderController = new OrderController;
            $OrderController->store($request);

            if($request->payment_option == 'bank'){
                    echo 'bank';
            }elseif($request->payment_option == 'paypal'){
                echo 'bank';
            }else{
                return redirect()->route('dashboard')->with('messege','Order Place Successfully');
            }
        }
    }
}
