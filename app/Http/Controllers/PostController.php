<?php

namespace App\Http\Controllers;

use App\Test;
use App\Models\Post;
use App\Models\Category;
use App\Mail\StoreTaskMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{   

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {   
        // Mail::raw('Hello World', function ($message) {
        //     $message->to('user@gmail.com')->subject('Ap Hello Subject');
        // });
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
        
        // return $request;
        $validated = $request->validated();
        $post = Post::create(array_merge($validated,['user_id' => Auth::id()]));

        // Mail::to($request->user())->send(new StoreTaskMail($post));
        return redirect()->route('posts.index')->with(config('aprogrammer.create'));
    }


    public function show(Post $post,Test $test)
    {     
        
        // dd($test);
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
        return view('edit',compact('post','categories'))->with(['status'=>'successfully updated']);
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

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
