@extends('layout')

@section('content')
    <h1 class="mt-4 text-center">Hello Post</h1>
  @foreach($posts as $post)
    <div class="col-6 ">
        <div class="card mb-4">
            <div class="card-header">
                {{ $post->name }}
            </div>
            <div class="card-body">
            {{ \Illuminate\Support\Str::limit($post->description,100) }}
            </div>
        </div>
    </div>
      @endforeach

@endsection
