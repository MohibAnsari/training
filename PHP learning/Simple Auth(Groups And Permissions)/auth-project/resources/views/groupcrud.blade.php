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
<?php
// var_dump($work);
// die();

use Symfony\Component\VarDumper\VarDumper;

?>

<?php
// var_dump($user);
// die();
?>
@if($work=='index')
<h1 class="text-center">Add Data</h1>
    <form method="POST" action="/group_store">
        @csrf
        <div class="mb-3">
        <label><b>Group Name:</b></label>
        <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
        <label><b>Permission:</b></label>
        <input type="text" name="author" class="form-control" required>
        </div>
        <input type="submit" name="insert" value="Insert" class="btn btn-primary">
    </form>

    @elseif($work=='edit')
    <h1 class="text-center">Update Data</h1>
    <form method="POST" action="/group_update/{{$Group->id}}">
        @csrf
        <div class="mb-3">
        <label><b>Post Title:</b></label>
        <input type="text" name="title" class="form-control" value="{{$Group->name}}" required>
        </div>
        <div class="mb-3">
        <label><b>Post Author:</b></label>
        <input type="text" name="author" class="form-control" value="{{$Group->permission}}" required>
        </div>
        <input type="submit" name="update" value="update" class="btn btn-success">
    </form>
    
@endif

<h1 class="text-center">Inserted Data</h1>
    <table class="table table-bordered shadow text-center table-striped">
    <tr>
        <th>Group Id</th>
        <th>Group Name</th>
        <th>Group Permissions</th>
        <th>group Delete</th>
        <th>group Edit</th>
    </tr>
    @foreach($Groups as $group_item)
    <tr>
        <td>{{$group_item->id}}</td>
        <td>{{$group_item->name}}</td>
        <td>{{$group_item->permission}}</td>
        <!-- <td>{{$group_item->created_by}}</td>
        <td>{{$group_item->updated_by}}</td> -->
        <td>@if($group_item->id!=0 && $group_item->id!=1)
            <a href="group_item_delete/{{$group_item->id}}" class="btn btn-danger">DELETE</a>
            @endif
        </td>
        <td>
        @if($group_item->id!=0 && $group_item->id!=1)
            <a href="/group_edit/{{$group_item->id}}" class="btn btn-success">EDIT</a>
            @endif
        </td>        
    </tr>
    @endforeach
    
    </table>
</div>
</body>

</html>
@endsection