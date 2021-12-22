@extends('layout')
@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header text-center">Create New Post</h5>
        <div class="card-body">
            <form action="/posts" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter name" value="{{ old('name') }}">
                    @error('name')
                        <br>
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="textarea">Description</label>
                    <textarea placeholder="Enter description" name="description" class="form-control @error('description') is-invalid @enderror" id="textarea" rows="3">
                    {{ old('description') }}
                    </textarea>
                    @error('description')
                        <br>
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
                <a href="/posts" class="btn btn-success">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection 