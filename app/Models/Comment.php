<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment_content'];
    
    // Define a relationship to get the user who posted the comment
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');    // 'user_id' is the foreign key in the comments table 
    }   // and now we can get the user who posted the comment by using $comment->user

    // Define a relationship to get the post the comment belongs to
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');    // 'post_id' is the foreign key in the comments table
    }

}
