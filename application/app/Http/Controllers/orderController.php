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
use Barryvdh\DomPDF\Facade\Pdf;

class orderController extends Controller
{ 
    public function index(){
        $list=Order::orderBy('id','desc')->get();
        return view('order.list')->with('list',$list);
    }
    public function printInvoice($id){
        //echo $id;
        $data['orderdetils']=Order::find($id);
        $data['orderitems']=OrderItem::where('oid',$id)->get();
        $data['shipping']=Shipping::where('oid',$id)->first();
        $data['payment']=Payment::where('oid',$id)->first();
        $data['userdata']=User::where('id',$data['orderdetils']->uid)->first();
        $pdf = PDF::loadView('order.printInvoice', $data);
        $pdf->setPaper(array(0,0,750,1060), 'portrait');
        return $pdf->stream('invoice_'.$id.'_'.time().'.pdf',array("Attachment"=>0));
    }
    public function pdfInvoice($id){
        //echo $id;
        $data['orderdetils']=Order::find($id);
        $data['orderitems']=OrderItem::where('oid',$id)->get();
        $data['shipping']=Shipping::where('oid',$id)->first();
        $data['payment']=Payment::where('oid',$id)->first();
        $data['userdata']=User::where('id',$data['orderdetils']->uid)->first();
        $pdf = PDF::loadView('order.printInvoice', $data);
        $pdf->setPaper(array(0,0,750,1060), 'portrait');
        return $pdf->download('invoice_'.$id.'_'.time().'.pdf',array("Attachment"=>0));
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
