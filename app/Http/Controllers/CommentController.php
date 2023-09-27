<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// -------- Self Added
use App\Models\Comment;


class CommentController extends Controller
{
    // SEVEN RESTful controller actions
    // 1. index() - show all comments
    // 2. show() - show a single comment
    // 3. create() - show a form to create a new comment
    // 4. store() - save the new comment
    // 5. edit() - show a form to edit an existing comment
    // 6. update() - save the edited comment
    // 7. destroy() - delete a comment


    // 1. index() - show all comments
    public function index()
    {
        // Get all comments from the database
        $comments = Comment::all();

        // Return a view to display them
        return view('comments.index', ['comments' => $comments]);
    }
    public function store(Request $request)
    {
        $user_id = $request->input('user_id');
        
        $post_id = $request->input('post_id');
        $comment_text = $request->input('comment-txt');

        // Create a new comment and associate it with the user
        $comment = new Comment();
        $comment->comment_content = $comment_text;
        $comment->user_id = $user_id; // Associate the comment with the user
        $comment->post_id = $post_id; // Associate the comment with the user
        $comment->save();

        return redirect()->route('blog.index')->with('info', 'A Comment has been created successfully.');
    }

}
