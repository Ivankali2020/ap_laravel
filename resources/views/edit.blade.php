@extends('layout')

@section('content')
<h1 class="mt-4 text-center">Hello Post</h1>
<div class="col-6 ">
    <div class="card mb-4">
        <div class="card-header">
            Edit Posts
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update',$post->id) }}" method="post" >
                @csrf
                @method('put')
                <input type="text" name="name" class="form-control" value="{{ old('name', $post->name ) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="description" class="form-control my-3" value="{{ $post->description }}">
                <button class="btn btn-success">Edit</button>
                <a href="{{ route('posts.index') }}" class="btn btn-warning">Back</a>
            </form>

        </div>
    </div>
</div>

@endsection
