<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Users;
use Illuminate\Http\Request;
use Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Groups=Group::all();
        $user=Users::find(Auth::user()->id);
        if($user->group->name!='admin'){
            $Groups = $Groups->where('created_by', Auth::user()->id);
        }
        $work="index";
        return view('Groupcrud',compact('work','Groups','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Groups=new Group;
        $Groups->name=$request->get('title');
        $Groups->permission=$request->get('author');
        $Groups-> save();
        // $data='<h1>Data Added Successfully.....</h1>';
        // return view('show',compact('posts'));
        // return redirect('/show');
        // return view('insert',compact('data'));
        // echo "<h1>Data Added Successfully.....</h1>";
        // $page_data=>$data
        return redirect('group');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo "hello";
        $Group=Group::find($id);
        // dd($Group->id);
        // die();
        // full
        // if($Group->id != 0 && $Group->id !=1){
        //     print_r('Id is Right');
        //     $Groups=Group::all();
        //     $Groups = $Groups->where('created_by', Auth::user()->id);
        //     $work="edit";
        //     return view('Groupcrud',compact('work','Groups','Group'));
        // }
        // else{
        //     return redirect('group');
        // }

        // less

        if($Group->id == 0 || $Group->id ==1){
            return redirect('group');
        }

        // orignal
        // var_dump($Group);
        // die();
        // return view('edit',['posts'=>$posts]);
        $Groups=Group::all();
        // $Groups = $Groups->where('created_by', Auth::user()->id);
        
        $user=Users::find(Auth::user()->id);
        if($user->group->name!='admin'){
            $Groups = $Groups->where('created_by', Auth::user()->id);
        }
        // var_dump($Groups);
        // die();
        $work="edit";
        return view('Groupcrud',compact('work','Groups','Group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $Groups,$id)
    {
        $Groups=Group::find($id);
        $Groups->name=$request->get('title');
        $Groups->permission=$request->get('author');
        $Groups-> update();
        // return redirect('/show');
        // $work="update";
        // return view('dummy',compact('work'));
        return redirect('group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $Group,$id)
    {
        // if($id != null){

        $Group=Group::find($id);
        $Group->delete();
        return redirect('group');
        // return view('groupcrud');

        // Group::destroy(array('id',$id));
        // return('groupcrud');
    
    // }
    // else {
    //     return view('groupcrud')->with('groups',Group::all());
    // }
}

}
