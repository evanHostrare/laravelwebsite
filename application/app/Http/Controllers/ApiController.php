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
            if(!isset($request->id)){
                $users=User::select('id','name','email')->get();
            }else{
                $users=User::where('id',$request->id)->select('id','name','email')->first();
            }
            if(!$users){
                return $data=['message'=>'User Not Exist!'];
            }
            $data=json_decode($users);
            return $data;
        }else{
           return $data=['error'=>'Auth Missmatch!'];  
        }
    }
    public function userRegestration(Request $request) {
        if($request->token=='eyroiweriqwryi'){
            $checkemail=User::where('email',$request->email)->first();
            if($checkemail){
                return $data=['message'=>'This user Already Exist!'];
            }
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->save();
            if($user->id){
                return $data=['message'=>'Registration Successful!'];  
            }else{
                return $data=['message'=>'Registration Failed!'];
            }
        }else{
           return $data=['error'=>'Auth Missmatch!'];  
        }
    }
    public function userDataUpdate(Request $request) {
        if($request->token=='eyroiweriqwryi'){            
            $user=User::find($request->id);
            $user->name=$request->name;
            if($request->password){
                $user->password=bcrypt($request->password);
            }
            $user->save();
            if($user->id){
                return $data=['message'=>'Name & Password Update Successful!'];  
            }else{
                return $data=['message'=>'Name  & Password Update Failed!'];
            }
        }else{
           return $data=['error'=>'Auth Missmatch!'];  
        }
    }
    public function userDataDelete(Request $request) {
        if($request->token=='eyroiweriqwryi'){
            if(!isset($request->id)){
                return $data=['message'=>'ID Required!'];  
            }
            $user=User::find($request->id);
            if(!$user){
                return $data=['message'=>'ID not Found!'];  
            }
            User::where('id',$request->id)->delete();
            return $data=['message'=>'Delete Successful!'];
        }else{
           return $data=['error'=>'Auth Missmatch!'];  
        }
    }
    
}
