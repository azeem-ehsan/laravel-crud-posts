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
        <div class="alert alert-success">Signed In User: {{ session('username') }}</div>
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

<div class="text-end mx-5">
    <a href="{{route('blog.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create Post</a>
</div>
<hr>

<div class="container">



    @foreach ($posts as $post)
    <div class="col-md-8 m-auto my-5">
        <a href="{{route('blog.show' , ['id' => $post->id])}}" style="text-decoration: none;">
            <div class="post card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> 
                            <img src="../css/images/profile.jpg" alt="">    
                        </div>
                        <div class="ms-2 c-details">
                             <!-- Display the User's Username -->
                             <h6 class="mb-0">{{ $post->user->username }}</h6>
                              <span>1 days ago</span>
                        </div>
                    </div>
                    <div class="badge"> <span>New</span> </div>
                </div>
                <div class="mt-5 post-content">
                    <!-- <h3 class="heading">Senior Product<br>Designer-Singapore</h3> -->
                    <h3 class="heading">{{$post->title}}</h3>

                    <div class="post-image">
                        <img class="" src="{{$post->image_url}}" alt="image">
                    </div>

                    <div class="post-content">
                        {{$post->post_description}}
                    </div>
                    <div class="mt-5">
                        <!-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                        <div class="mt-3">
                            <button class="btn btn-like">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            </button>
                            <span class="text1">55 Likes <span class="text2">of 50 capacity</span></span> </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

@endforeach
</div>


@endsection