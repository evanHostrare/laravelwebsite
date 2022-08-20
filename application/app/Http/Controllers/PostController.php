<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use Session;
use Auth;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $postlist = DB::table('posts')
                    ->join('users', 'posts.creator', '=', 'users.id')
                    ->select('posts.*', 'users.email as posteremail','users.name as postername')
                    ->get();
        return view('posts.list')
                ->with('list', $postlist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $post=new Post();
        $post->title=$request->title;
        $post->section=$request->section;
        if($request->picture){
            $imageName=Carbon::now()->timestamp.'.'.$request->picture->extension();
            $request->picture->storeAs('posts/',$imageName);
            $post->picture=$imageName;
        }
        $post->faicon=$request->faicon;
        $post->creator=Auth::user()->id;
        $post->content=$request->content;
        $post->save();
        // Checking Save working or not
        if($post->id){
            Session()->put('message','Save Successful!');
            return redirect('posts');
        }else{
            Session()->put('message','Save Failed!'); 
            return redirect('posts/create');
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
        $singlepost=Post::where('id',$id)->first();
        //$singlepost=Post::find($id); 
        return view('posts.edit')
                ->with('singlepost',$singlepost);
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
        $post=Post::where('id',$id)->first();
        $post->title=$request->title;
        $post->section=$request->section;
        if($request->picture){
            $imageName=Carbon::now()->timestamp.'.'.$request->picture->extension();
            $request->picture->storeAs('posts/',$imageName);
            $post->picture=$imageName;
        }
        $post->faicon=$request->faicon;
        $post->content=$request->content;
        $post->save();
        // Checking Save working or not
        if($post->id){
            Session()->put('message','Save Successful!');
            return redirect('posts');
        }else{
            Session()->put('message','Save Failed!'); 
            return redirect('posts/create');
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
        Post::where('id',$id)->delete();
        return redirect('posts');
    }
}
