@extends('layout')

@section('content')
        <div class="col-6 m-auto mt-5 ">
            <div class="card mb-4">
                <div class="card-header">
                  {{ $post->name }}
                </div>
                <div class="card-body">
                    <div class="">
                        {{ $post->description }}
                        {{ $post->category }}
                    </div>
                    <div class="text-end  ">
                        <a href="{{ route('posts.index') }} " class="btn btn-warning ">Back</a>
                    </div>
                </div>
            </div>
        </div>

@endsection
