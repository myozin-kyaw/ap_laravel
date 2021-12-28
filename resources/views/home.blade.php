@extends('layout')
@section('content')
<div class="container">
    <div>
        <a href="/posts/create" class="btn btn-success">New Post</a>
        <a href="logout" class="btn btn-default bg-dark text-white">Logout</a>
        <div style="float:right;"><b>{{Auth::user()->name}}</b></div>
    </div>
    
    <br>
    <div class="card">
        <h5 class="card-header text-center">Content</h5>
        <div class="card-body">
            @foreach($data as $post)
            <h5 class="card-title">{{$post->name}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <p class="card-text">{{'Category : ' . $post->categories->category_name}}</p>
            <p class="card-text">{{'Post by : '. Auth::user()->name}}</p>
            <div class="form-row">
                <a style="height:40px; margin-right:10px;" href=" /posts/{{$post->id}}" class="btn btn-primary">More</a>
                <a style="height:40px; margin-right:10px;" href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
                <form action="/posts/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection 