@extends('layout.master')
@section('title', 'Sign In')

@section('content')

@if (Session::has('error')) 
    <!--  //Session::has('info') checks if the info key exists in the session -->
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            </div>
        </div> 
@endif
@if (Session::has('sign-out')) 
    <!--  //Session::has('info') checks if the info key exists in the session -->
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info">{{Session::get('sign-out')}}</div>
            </div>
        </div> 
@endif
@if (Session::has('sign-up')) 
    <!--  //Session::has('info') checks if the info key exists in the session -->
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info">{{Session::get('sign-up')}}</div>
            </div>
        </div> 
@endif


    <div class="row mt-5">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{route('usercheck')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email"
                      class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter an email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="text"
                      class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Enter a password">
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endsection
