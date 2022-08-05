<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class homeController extends Controller
{
    public function index() {
        $posts=Post::orderBy('id','asc')->get();
        return view('home')
            ->with('posts',$posts);
    }
    public function postRearange() {
        $posts=Post::select('id','title','content')->orderBy('title','desc')->get();
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
