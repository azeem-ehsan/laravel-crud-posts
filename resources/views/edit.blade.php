@extends('layout.master')
@section('title' , 'Edit Blog')
@section('content')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{route('blog.update')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Post Title:</label>
                  <input type="text"
                    class="form-control" name="title" value="{{$blog->title}}" id="title" aria-describedby="helpId" placeholder="Enter the Blog title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Description:</label>
                    <input type="text"
                      class="form-control" name="post_description" value="{{$blog->post_description}}" id="description" aria-describedby="helpId" placeholder="Enter the Blog Description">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Image Url:</label>
                    <input type="text"
                      class="form-control" name="image_url" value="{{$blog->image_url}}" id="description" aria-describedby="helpId" placeholder="Enter the Image URL..">
                </div>
                <input type="hidden" name="id" value="{{$blog->id}}">
                <button type="submit" class="btn btn-primary">Edit Blog</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endsection
