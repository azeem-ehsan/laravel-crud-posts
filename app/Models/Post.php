<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //------------------ by default laravrel adds , ID , Created At , Updated At 
    //------------------ these Models are only for an overview of the DB , Laravel will not create the DB for you

    protected $fillable = ['post_content', 'image_url' , 'title'];


    //  Post model will have a relationship with the User model, allowing you to retrieve the user who created a post using $post->user.
    // with Following function we can get the user who created the post
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

}
