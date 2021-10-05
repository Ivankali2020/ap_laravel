@extends('layout')

@section('content')
    <h1 class="mt-4 text-center">Hello Post</h1>
    <div class="mb-3 ">
        @isset($status)
            {{ $status }}
        @endisset
        
        @if(session('status'))
            {{ session('id')}}
            <div class="alert alert-success ">{{ session('status') }}</div>
        @endif

    
        <a href="{{ route('posts.create') }}" class="btn btn-success">New</a>

    </div>
  @foreach($posts as $post)
    <div class="col-6 ">
        <div class="card mb-4">
            <div class="card-header">
                {{ $post->name }}
            </div>
            <div class="card-body">
                <p>
                    {{ \Illuminate\Support\Str::limit($post->description,100) }}
                </p>
                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('posts.show',$post->id) }}" class="btn btn-primary">Detail</a>

                <form action="{{ route('posts.destroy',$post->id) }}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class=" btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
      @endforeach

@endsection
