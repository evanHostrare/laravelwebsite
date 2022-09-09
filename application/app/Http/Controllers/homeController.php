<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
use App\Models\Cat;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use Cart;
use Session;

class homeController extends Controller
{
    
    public function index() {
        $services=Post::where('section','services')->orderBy('id','asc')->get();
        $portfolios=Post::where('section','portfolio')->orderBy('id','asc')->get();
        $abouts=Post::where('section','about')->orderBy('id','asc')->get();
        $teams=Post::where('section','team')->orderBy('id','asc')->get();
        $cats=Cat::where('parent',0)->get();
        return view('home')
            ->with('services',$services)
            ->with('portfolios',$portfolios)
            ->with('abouts',$abouts)
            ->with('cats',$cats)
            ->with('teams',$teams);
    }
    public function cartitems() {
        $sessid=Session::getId();
        $cartitems=Cart::session($sessid)->getContent();
        //dd($cartitems);
        $cats=Cat::where('parent',0)->get();
        return view('cartitems')
        ->with('cartitems',$cartitems)
        ->with('cats',$cats);
    }
    public function category($catid) {
        $productbycatid=Product::where('catid',$catid)->get();
        $cats=Cat::where('parent',0)->get();
        $catename=Cat::where('id',$catid)->value('name');
        return view('category')
        ->with('productbycatid',$productbycatid)
        ->with('catename',$catename)
        ->with('cats',$cats);
    }
    public function addtocart(Request $request, $productid) {
        $productdata=Product::find($productid);
        $sessid=Session::getId();
        Cart::session($sessid)->add(array(
            'id' => $productdata->id,
            'name' => $productdata->name,
            'price' => $productdata->price,
            'quantity' => $request->qty,
            'attributes' => array([
                "picture"=>$productdata->picture,
            ])
        ));
        // $sessid=Session::getId();
        // $cartitems=Cart::session($sessid)->getContent();
        // dd($cartitems);
        return redirect()->back();
    }
    public function sendContactUs(Request $request) {
        //dd($request->all());
        Mail::to('evan@hostrare.com')->send(new ContactUs($request->name,$request->email,$request->phone,$request->content));
        return redirect('/');
    }
    public function postRearange() {
        $posts=Post::select('id','title','content')->where('section','services')->orderBy('title','desc')->get();
        return $posts;
    }
    public function home2() {
        return view('rana');
    }
    public function home() {
        return view('rana2');
    }
    public function home3() {
        return view('rana');
    }
    public function contact(){
        return view('contact');
    }
    public function product(){
        return view('product');
    }
}
