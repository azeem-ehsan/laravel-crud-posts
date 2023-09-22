<nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Game Heaven</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
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