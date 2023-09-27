<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// -------- Sel Added 
use App\Models\Post;
use App\Models\Comment;


class PostController extends Controller
{
    //SEVEN RESTFUL RESOURCE CONTROLLER METHODS
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view('home', ['heading' => '', 'posts' => $posts , 'comments' => $comments]);
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('blog', ['heading' => 'Show a Blog', 'post' => $post]);
    }
    public function create()
    {
        return view('create', ['heading' => 'Create a Post']);
    }
    
    // when creating a Post
    public function store(Request $request)
    {
        $title = $request->input('title');
        $post_description = $request->input('post_description');
        $image_url = $request->input('image_url');
    
        // Retrieve the user ID from the session which we stored earlier when Logging in the user
        $user_id = session('user_id');
    
        // Create a new post and associate it with the user
        $post = new Post();
        $post->title = $title;
        $post->post_content = $post_description;
        $post->image_url = $image_url;
        $post->user_id = $user_id; // Associate the post with the user
        $post->save();
    
        return redirect()->route('blog.index')->with('info', 'A Post has been created successfully.');
    }
    
    public function store_user(Request $request)
    {
        echo $request->method(); // to print the method of the request
        $title = $request->input('title');
        $post_description = $request->input('post_description');
        $image_url = $request->input('image_url');
        // return "Title:$title, Description: $description";
        $post = new Post();
        $post->title = $title;   // not created yet
        $post->post_description = $post_description;
        $post->image_url = $image_url;
        $post->save(); //Insert data in the blogs table
        return redirect()->route('blog.index')->with('info', 'A Blog has been created successfully.');
    }

    public function edit($id)
    {
        $blog = Post::find($id);
        return view('edit', ['heading' => 'Edit a Blog', 'blog' => $blog]);
    }
    // for Updating the post
    public function update(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('post_description');
        $image_url = $request->input('image_url');
        $id = $request->input('id');
        $blog = Post::find($id);
        $blog->title = $title;
        $blog->post_description = $description;
        $blog->image_url = $image_url;
        $blog->save(); //update the blog record
        return redirect()->route('blog.index')->with('info', 'Post Updated successfully.');
    }
    public function destroy($id)
    {
        $blog = Post::find($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Post Deleted successfully.');
    }
}
