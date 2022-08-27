<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cat;
use Session;
use Auth;
use DB;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catlist = DB::table('categories')
                    ->join('users', 'categories.creator', '=', 'users.id')
                    ->select('categories.*', 'users.email as posteremail','users.name as postername')
                    ->get();
        return view('cats.list')
                ->with('list', $catlist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Cat::where('parent',0)->get();
        return view('cats.create')->with('cats',$cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $cats=new Cat();
        $cats->name=$request->name;
        $cats->parent=$request->parent;
        $cats->status=1;
        $cats->creator=Auth::user()->id;
        $cats->save();
        // Checking Save working or not
        if($cats->id){
            Session()->put('message','Save Successful!');
            return redirect('cats');
        }else{
            Session()->put('message','Save Failed!'); 
            return redirect('cats/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats=Cat::where('parent',0)->get();
        $singlecat=Cat::where('id',$id)->first();
        //$singlepost=Post::find($id); 
        return view('cats.edit')
                ->with('cats',$cats)
                ->with('singlecat',$singlecat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cats=Cat::where('id',$id)->first();
        $cats->name=$request->name;
        $cats->parent=$request->parent;
        $cats->save();
        // Checking Save working or not
        if($cats->id){
            Session()->put('message','Save Successful!');
            return redirect('cats');
        }else{
            Session()->put('message','Save Failed!'); 
            return redirect('cats/'.$id.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cat::where('id',$id)->delete();
        return redirect('cats');
    }
}
