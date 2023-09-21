<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Blog;
use App\Models\Post;


class PostController extends Controller
{
    //SEVEN RESTFUL RESOURCE CONTROLLER METHODS
    public function index()
    {
        $posts = Post::all();
        return view('home', ['heading' => 'View all Posts', 'posts' => $posts]);
    }
    public function show($id)
    {
        $blog = Post::find($id);
        return view('blog', ['heading' => 'Show a Blog', 'blog' => $blog]);
    }
    public function create()
    {
        return view('create', ['heading' => 'Create a Blog']);
    }
    public function store(Request $request)
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


    // public function store(Request $request)
    // {
    //     echo $request->method(); // to print the method of the request
    //     $title = $request->input('title');
    //     $description = $request->input('description');
    //     // return "Title:$title, Description: $description";
    //     $blog = new Blog();
    //     $blog->title = $title;
    //     $blog->description = $description;
    //     $blog->save(); //Insert data in the blogs table
    //     return redirect()->route('blog.index')->with('info', 'A Blog has been created successfully.');
    // }
    public function edit($id)
    {
        $blog = Post::find($id);
        return view('edit', ['heading' => 'Edit a Blog', 'blog' => $blog]);
    }
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
