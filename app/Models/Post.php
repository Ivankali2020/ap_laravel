<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Category;
use App\Mail\StoreTaskMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{   
    protected $guarded =[];
    use HasFactory;

    /**
     * Get all of the category for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public static function booted(){
    //     static::created(function($post){            
    //         Mail::to(Auth::user()->email)->send(new StoreTaskMail($post));
    //     });

    //     static::updating(function($post){            
    //         Mail::to(Auth::user()->email)->send(new StoreTaskMail($post));
    //     });
    // }

   
}
