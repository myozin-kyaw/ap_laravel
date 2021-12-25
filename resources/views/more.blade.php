@extends('layout')
@section('content')
<div class="container">
    <br>
    <div class="card">
        <h5 class="card-header text-center">Post Detail</h5>
        <div class="card-body">
            <h5 class="card-title">{{$post->name}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <p class="card-text">{{'Category : ' . $post->categories->category_name}}</p>
            <a href="/posts" class="btn btn-success">Back</a>
            <hr>
        </div>
    </div>
</div>
@endsection 