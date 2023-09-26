<nav class="navbar navbar-expand-lg  bg-body-tertiary  mb-5" data-bs-theme="">
  <div class="container-fluid flex-wrap">
    <h1 class="navbar-brand col-12 text-center" href="#"><i class="fas fa-chess-king"></i> Game Heaven <i class="fas fa-gamepad"></i></h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">

        <ul class="navbar-nav m-auto w-50 mb-2 mb-lg-0 d-flex justify-content-between">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('blog.index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('about')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('contact')}}">Contact Us</a>
          </li>
          
          
          @if (Session::has('username'))
          <form action="{{route('logout')}}" method="post">
            @csrf

            <li class="nav-item">
              <button type="submit"  class="nav-link active" >Log Out</button>
            </li>

          </form>
          @else
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('create-user')}}">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('login')}}">Sign In</a>
          </li>
          
          @endif
        </ul>   
      </div>
    </div>
  </nav>