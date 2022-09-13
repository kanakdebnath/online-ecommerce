<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::user()) {

            if (Auth::user()->user_type == 'admin') {
                return view('admin.dashboard');
            }else if (Auth::user()->user_type == 'user') {
                return view('frontend.dashboard');
            }else{
                return redirect()->route('login');
            }
           
        }else{
            return redirect()->route('login');
        }
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
