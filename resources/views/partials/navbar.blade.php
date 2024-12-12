<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="/">Stayfit</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link {{ $active == "Home"  ? "active" : ""}}" aria-current="page" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ $active == "About" ? "active" : ""}}" href="/about">About</a></li>
        <li class="nav-item"><a class="nav-link {{ $active == "posts" ? "active" : ""}}" href="/posts">Blog</a></li>
        <li class="nav-item"><a class="nav-link {{ $active == "categories"  ? "active" : ""}}" href="/categories">Categories</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
      @auth
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Welcome Back, {{ auth()->user()->name }}
    </a>
    <ul class="dropdown-menu">
       <li><a class="dropdown-item" href="
    @if(auth()->user()->role == 0) /users
    @elseif(auth()->user()->role == 1) /doctor
    @elseif(auth()->user()->role == 2) /admin  
    @endif">
    <i class="bi bi-layout-text-sidebar-reverse"></i>My Dashboard
</a></li>

        <li><hr class="dropdown-divider"></li>
        <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Log Out</button>
            </form>
        </li>

 

    </ul>
</li>

      @else
        <li class="nav-item">
          <a href="/login" class="nav-link {{ $active == "login"  ? "active" : ""}} text-white"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
      @endauth
      </ul>
    </div>
  </div>
</nav>


