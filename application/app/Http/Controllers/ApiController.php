<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cat;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use Cart;
use Auth;
use Session;

class ApiController extends Controller
{
    
    public function index(Request $request) {
        if($request->token=='eyroiweriqwryi'){
            $users=User::select('id','name','email')->get();
            $data=json_decode($users);
            return $data;
        }else{
            return $data=['error'=>'Auth Missmatch!'];  
        }
    }
}
