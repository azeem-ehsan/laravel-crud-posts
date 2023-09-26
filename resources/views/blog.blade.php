@extends('layout.master')
@section('title' , "Blog")
@section('content')
    <div class="col-md-8 m-auto my-5">
            <div class="post card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> 
                            <img src="../css/images/profile.jpg" alt="">    
                        </div>
                        <div class="ms-2 c-details">
                            <!-- User Who Created -->
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
        @if($post->user->username == session('username'))
        <!-- if the User who created the Post and Logged in User is Same  -->
            <div class="post-options text-center">
                <a href="{{route('blog.edit' , ['id' => $post->id])}}" class="btn btn-warning mx-4"><i class="far fa-edit"></i> Edit</a>
                <a href="{{route('blog.delete' , ['id' => $post->id])}}" class="btn btn-danger mx-4"><i class="fas fa-trash"></i> Delete</a>
            </div>
        @endif
    </div>
    <a href="{{route('blog.index')}}" class="btn btn-info">Go back to Home Page</a>

@endsection