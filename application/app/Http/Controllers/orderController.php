<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
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

class orderController extends Controller
{ 
    public function index(){
        $list=Order::orderBy('id','desc')->get();
        return view('order.list')->with('list',$list);
    }
    public function invoice($id){
        $orderdetils=Order::find($id);
        $orderitems=OrderItem::where('oid',$id)->get();
        $shipping=Shipping::where('oid',$id)->first();
        $payment=Payment::where('oid',$id)->first();
        $userdata=User::where('id',$orderdetils->uid)->first();
        return view('order.invoice')
                ->with('orderdetils',$orderdetils)
                ->with('orderitems',$orderitems)
                ->with('shipping',$shipping)
                ->with('payment',$payment)
                ->with('userdata',$userdata);
    }
}
