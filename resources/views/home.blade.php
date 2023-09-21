@extends('layout.master')
@section('title' , "Home")
@section('content')
    @if (Session::has('info')) 
    <!--  //Session::has('info') checks if the info key exists in the session -->
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info">{{Session::get('info')}}</div>
            </div>
        </div> 
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

