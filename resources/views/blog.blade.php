@extends('layout.master')
@section('title' , "Blog")
@section('content')
    <h2>{{$blog->title}}</h2>
    <p>{{$blog->description}}</p>
    <a href="{{route('blog.index')}}" class="btn btn-info">Go back to Home Page</a>
@endsection