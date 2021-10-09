@extends('layout')

@section('content')
        <div class="col-12 col-md-6  m-auto mt-5 ">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-around">
                    <div class="">
                        {{ $post->name }}
                    </div>
                    <div class="">
                        {{ $post->category->title ?? 'unknow cat' }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        {{ $post->description }}
                    </div>
                    <div class="text-end  ">
                        <a href="{{ route('posts.index') }} " class="btn btn-warning ">Back</a>
                    </div>
                </div>
            </div>
        </div>

@endsection
