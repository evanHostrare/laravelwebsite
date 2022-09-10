<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Models\Cat;
use Auth;

class loginController extends Controller
{
    // public function __construct()
    //     {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('guest:admin')->except('logout');
    //     }
    public function adminlogin(){
        $cats=Cat::where('parent',0)->get();
        return view('adminauth.adminlogin')
        ->with('cats',$cats);
    }
    public function adminlogincheck(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect('dashboard');
        }else{
        return back()->withInput($request->only('email', 'remember'));
        }
    }
    public function adminlogout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
