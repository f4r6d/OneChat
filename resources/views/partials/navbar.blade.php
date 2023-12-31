<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:rgb(0,255,255);opacity:0.5">
  <a class="navbar-brand" href="{{ route('home') }}">OneChat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
   
      <li class="nav-item">
        <a class="nav-link" href="{{ route('chat') }}">Chat</a>
      </li>

      @guest  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Register/Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('register.form') }}">Register</a>
          <a class="dropdown-item" href="{{ route('login.form') }}">Login</a>
        </div>
      </li>
      @endguest

      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
      </li>
      @endauth

      
    </ul>
   
  </div>
</nav>