@extends('layout.master')
@section('title', 'Sign Up')

@section('content')
    <div class="row mt-5">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{route('userstore')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">User Name:</label>
                  <input type="text"
                    class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Enter a username">
                </div>
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
                
                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endsection
