<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    //SEVEN RESTFUL RESOURCE CONTROLLER METHODS
    // public function index()
    // {
    //     $posts = Post::all();
    //     return view('home', ['heading' => 'View all Posts', 'posts' => $posts]);
    // }
    // public function show($id)
    // {
    //     $blog = Post::find($id);
    //     return view('blog', ['heading' => 'Show a Blog', 'blog' => $blog]);
    // }
    // public function create()
    // {
    //     return view('create', ['heading' => 'Create a Blog']);
    // }
    public function store(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        // return "username:$username, Description: $description";
        $user = new User();
        $user->username = $username;   // not created yet
        $user->email = $email;
        $user->password = $password;
        $user->save(); //Insert data in the blogs table
        return redirect()->route('login')->with('sign-up', 'Signed-Up successfully.');
    }
    // when User Login
    public function authuser(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        // return "username:$username, Description: $description";

        $user = User::where('email', $email)->where('password', $password)->first();    // first() will return the first record

        if($user == null)
            return redirect()->route('login')->with('error', 'Email or Password is incorrect...!!');

        // Store the username in a session variable
        session(['username' => $user->username]);

        return redirect()->route('blog.index')->with('sign-in', 'Signed-In successfully.');
    }
    public function LogOut(Request $request)
    {
        $request->session()->forget('username');
        return redirect()->route('login')->with('sign-out', 'Please Login Again....');
    }
    
    // public function store_user(Request $request)
    // {
    //     echo $request->method(); // to print the method of the request
    //     $title = $request->input('title');
    //     $post_description = $request->input('post_description');
    //     $image_url = $request->input('image_url');
    //     // return "Title:$title, Description: $description";
    //     $post = new Post();
    //     $post->title = $title;   // not created yet
    //     $post->post_description = $post_description;
    //     $post->image_url = $image_url;
    //     $post->save(); //Insert data in the blogs table
    //     return redirect()->route('blog.index')->with('info', 'A Blog has been created successfully.');
    // }


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
    // public function edit($id)
    // {
    //     $blog = Post::find($id);
    //     return view('edit', ['heading' => 'Edit a Blog', 'blog' => $blog]);
    // }
    // public function update(Request $request)
    // {
    //     $title = $request->input('title');
    //     $description = $request->input('description');
    //     $id = $request->input('id');
    //     $blog = Post::find($id);
    //     $blog->title = $title;
    //     $blog->description = $description;
    //     $blog->save(); //update the blog record
    //     return redirect()->route('blog.index')->with('info', 'A Blog has been edited successfully.');
    // }
    // public function destroy($id)
    // {
    //     $blog = Post::find($id);
    //     $blog->delete();
    //     return redirect()->route('blog.index')->with('info', 'A Blog has been deleted successfully.');
    // }
}
