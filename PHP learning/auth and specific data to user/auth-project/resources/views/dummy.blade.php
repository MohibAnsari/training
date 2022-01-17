@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
    
{{--<h1> {{$work}} {{$user->group}}</h1>
<h1> {{$work}} {{Auth::user()}}</h1>
<!-- <h1> {{Auth::user()}} </h1> -->--}}
{{--
@if($work=='index')
--}}
    <h1 class="text-center">Add Data</h1>
    <form method="POST" action=" @if($work=='index')
    /store
    @elseif($work=='edit')
    /update/{{$post->id}}
    @endif">
        @csrf
        <div class="mb-3">
        <label><b>Post Title:</b></label>
        <input type="text" name="title" class="form-control" value="@if($work=='edit'){{$post->post_title}}@endif" required>
        </div>
        <div class="mb-3">
        <label><b>Post Author:</b></label>
        <input type="text" name="author" class="form-control" value="@if($work=='edit'){{$post->post_author}}@endif" required>
        </div>
        <input type="submit" name="insert" value="Insert" class="btn btn-primary">
    </form>


{{--
    @elseif($work=='edit')
    <h1 class="text-center">Update Data</h1>
    <form method="POST" action="/update/{{$post->id}}">
        csrf
        <div class="mb-3">
        <label><b>Post Title:</b></label>
        <input type="text" name="title" class="form-control" value="{{$post->post_title}}">
        </div>
        <div class="mb-3">
        <label><b>Post Author:</b></label>
        <input type="text" name="author" class="form-control" value="{{$post->post_author}}    ">
        </div>
        <input type="submit" name="update" value="update" class="btn btn-success">
    </form>
    
@endif
--}}



<h1 class="text-center">Inserted Data</h1>
    <table class="table table-bordered shadow text-center table-striped">
    <tr>
        <th>Post Id</th>
        <th>Post Title</th>
        <th>Post Author</th>
        <th>created Id</th>
        <th>Updated Id</th>
        <th>Post Delete</th>
        <th>Post Edit</th>
    </tr>
    @foreach($posts as $post_item)
    <tr>
        <td>{{$post_item->id}}</td>
        <td>{{$post_item->post_title}}</td>
        <td>{{$post_item->post_author}}</td>
        <td>{{$post_item->created_by}}</td>
        <td>{{$post_item->updated_by}}</td>
        <td><a href="/delete/{{$post_item->id}}" class="btn btn-danger">DELETE</a></td>
        <td><a href="/edit/{{$post_item->id}}" class="btn btn-success">EDIT</a></td>
    </tr>
    @endforeach
    </table>
</div>
</body>

</html>
@endsection