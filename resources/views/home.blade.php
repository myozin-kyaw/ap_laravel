@extends('layout')
@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header text-center">Content</h5>
        <div class="card-body">
            @foreach($data as $post)
            <h5 class="card-title">{{$post->name}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <a href="#" class="btn btn-primary">Show me more</a>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection 