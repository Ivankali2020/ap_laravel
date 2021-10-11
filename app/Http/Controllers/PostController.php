<?php

namespace App\Http\Controllers;

use App\Test;
use App\Models\Post;
use App\Models\Category;
use App\Mail\StoreTaskMail;
use Illuminate\Http\Request;
use App\Events\PostCreateEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PostCreateNoti;
use App\Notifications\PostDeleteNoti;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Notification;

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
        // $data = [
        //     'name' => 'Ivan',
        //     'age' => 21,
        //     'job' => 'wanna be programmer'
        // ];
        // Notification::send(Auth::user(),new PostCreateNoti($data));
        // echo 'sent mail',exit();
        $auth = Auth::user();
        $posts = Post::all();
        $notifications = $auth->notifications;

        return view('posts',compact('auth','posts','notifications'));
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
        // Notification::send(Auth::user(),new PostCreateNoti($validated));
        // $user = Auth::user();
        // $user->notify(new PostCreateNoti($validated));
        event(new PostCreateEvent($post));
        return redirect()->route('posts.index')->with(config('aprogrammer.create'));
    }


    public function show(Post $post)
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
        Notification::send(Auth::user(),new PostDeleteNoti());
        $post->delete();
        return redirect()->route('posts.index');

    }

    public function logout(){
        Auth::logout();
        dd('hello');
        return redirect()->route('login');
    }
}
