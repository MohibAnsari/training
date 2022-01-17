<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Users;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('insert');
        $posts=Post::all();
        $user=Users::find(Auth::user()->id);
        if($user->group->name!='admin'){
            $posts = $posts->where('created_by', Auth::user()->id);
        }
        $work="index";
        return view('dummy',compact('work','posts','user'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts=new Post;
        $posts->post_title=$request->get('title');
        $posts->post_author=$request->get('author');
        $posts-> save();
        // $data='<h1>Data Added Successfully.....</h1>';
        // return view('show',compact('posts'));
        // return redirect('/show');
        // return view('insert',compact('data'));
        // echo "<h1>Data Added Successfully.....</h1>";
        // $page_data=>$data
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $posts=Post::all();
        // // return view('show',['posts'=>$posts]);
        // $work="show";
        // return view('dummy',compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // print_r($id);
        // exit();
        $post=Post::find($id);
        // return view('edit',['posts'=>$posts]);
        
        $posts=Post::all();
        $posts = $posts->where('created_by', Auth::user()->id);
        $work="edit";
        return view('dummy',compact('work','posts','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post,$id)
    {
        $posts=Post::find($id);
        $posts->post_title=$request->get('title');
        $posts->post_author=$request->get('author');
        $posts-> update();
        // return redirect('/show');
        // $work="update";
        // return view('dummy',compact('work'));
        return redirect('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,$id)
    {
        $post=Post::find($id);
        $post->delete();
        // return redirect('show');
        return redirect('home');
    }
}
