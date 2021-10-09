<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{   

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    { 
        $auth = Auth::user();
        $posts = Post::all();
        return view('posts',compact('auth','posts'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    public function store(PostFormRequest $request)
    {   
        
        $validated = $request->validated();
        Post::create($validated);
        return redirect()->route('posts.index')->with(['status'=>'successfully created']);
    }


    public function show(Post $post)
    {       
        $this->authorize('view',$post);
        // if($post->user_id != Auth::id()){
        //     return abort('404');
        // }
        return view('show',compact('post'));
    }

    
    public function edit(Post $post)
    {
        $this->authorize('view',$post);
        $categories = Category::all();
        return view('edit',compact('post','categories'));
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
