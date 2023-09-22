@extends('layout.master')
@section('title' , 'Create Blog')



@section('content')


@if(Session::has('username')  == false)

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

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{route('blog.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Post Title:</label>
                  <input type="text"
                    class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Enter the Blog title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Content:</label>
                    <input type="text"
                      class="form-control" name="post_description" id="description" aria-describedby="helpId" placeholder="Enter the Blog Description">
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image Url:</label>
                    <input type="text"
                      class="form-control" name="image_url" id="image_url" aria-describedby="helpId" placeholder="url...">
                </div>
                <button type="submit" class="btn btn-primary">Create a Post</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
    
@endsection
