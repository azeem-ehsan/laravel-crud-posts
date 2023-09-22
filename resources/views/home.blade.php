@extends('layout.master')
@section('title' , "Posts")
@section('content')
    @if (Session::has('info')) 
    <!--  //Session::has('info') checks if the info key exists in the session -->
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info">{{Session::get('info')}}</div>
            </div>
        </div> 
    @endif
    @if (Session::has('username'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success">Welcome, {{ session('username') }}</div>
            </div>
        </div> 

        @else
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger">You are not signed in. Please <a href="{{ route('login') }}">sign in</a>.</div>
            </div>
        </div>
        
        <!-- redirect to the login page -->
        @php
            return redirect()->route('login');
            exit; // to prevent any further rendering of the view
        @endphp
    @endif
    <a href="{{route('blog.create')}}" class="btn btn-primary">Create a Post</a>
    <hr>
    <table class="table table-dark">
        <tr>
            <th>Count</th>
            <th>Posts</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
       @foreach ($posts as $post)
        <tr>
            <td><a href="{{route('blog.show' , ['id' => $post->id])}}">{{$post->title}}</a></td>
            <td>
                <a href="{{route('blog.show' , ['id' => $post->id])}}">  
                <img class="post-img" src="{{$post->image_url}}" alt="image">
                </a>
            </td>
            <!-- <td><a href="{{route('blog.show' , ['id' => $post->id])}}">{{$post->post_content}}</a></td> -->
            <td>
                <a href="{{route('blog.edit' , ['id' => $post->id])}}" class="btn btn-warning">Edit</a>
            </td>
            <td>
                <a href="{{route('blog.delete' , ['id' => $post->id])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr> 
       @endforeach
    </table>
@endsection

