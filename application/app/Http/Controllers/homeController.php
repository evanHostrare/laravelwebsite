<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home2() {
        return view('rana');
    }
    public function home() {
        return view('rana2');
    }
    public function home3() {
        return view('rana');
    }
}
