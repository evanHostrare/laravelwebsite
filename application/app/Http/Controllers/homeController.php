<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class homeController extends Controller
{
    public function index() {
        $services=Post::where('section','services')->orderBy('id','asc')->get();
        $portfolios=Post::where('section','portfolio')->orderBy('id','asc')->get();
        $abouts=Post::where('section','about')->orderBy('id','asc')->get();
        $teams=Post::where('section','team')->orderBy('id','asc')->get();
        return view('home')
            ->with('services',$services)
            ->with('portfolios',$portfolios)
            ->with('abouts',$abouts)
            ->with('teams',$teams);
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
