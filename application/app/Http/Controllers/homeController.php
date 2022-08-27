<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Cat;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

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
