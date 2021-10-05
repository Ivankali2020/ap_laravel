<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{

    public function index()
    {   $posts = Post::all();
        return view('posts',compact('posts'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(PostFormRequest $request)
    {   
        
        $validated = $request->validated();
        Post::create($validated);
        return redirect()->route('posts.index')->with(['status'=>'successfully created']);
    }


    public function show(Post $post)
    {
        return view('show',compact('post'));
    }


    public function edit(Post $post)
    {

        return view('edit',compact('post'));
    }


    public function update(PostFormRequest $request, Post $post)
    {            
        $validated = $request->validated();
        $post->update($validated);
        return redirect()->route('posts.index')->with(['status'=>'successfully updated']);

    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');

    }
}
