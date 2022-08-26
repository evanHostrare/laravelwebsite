<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rules\File;
use Session;
use Auth;
use DB;

use Carbon\Carbon;
use App\Models\Post;


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
        $rules = array(
            'title'       => 'required|max:10',
            'section'       => 'required',
            'picture' => 'required|mimes:png|max:2MB',
            'content'       => 'required|min:10'
        );
        $messages = [
            'title.required' => 'Title Required',
            'title.max' => 'Max 10 Carecter Allowed',
            'section.required' => 'Section Required',
            'picture.required' => 'Picture Required',
            'picture.mimes' => 'Only PNG File Allowed',
            'picture.max' => 'Max 2 MB Allowed',
            'content.required' => 'Content Required',
            'content.min' => 'Minimum 10 Carecter Required'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('posts/create')
                ->withErrors($validator)
                ->withInput();
        } else {
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
            return redirect('posts/'.$id.'/edit');
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
