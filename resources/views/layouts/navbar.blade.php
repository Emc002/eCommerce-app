@section("bootstrap")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@endsection
<nav class="navbar navBar navbar-expand-lg">
  <div class="container-fluid ">
    <a class="navbar-brand branding" href="{{ url('home') }}">E-Commerce </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav navPosition me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('todolists') }}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('ajax-datatable') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('productEtalase') }}">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('category') }}">Category</a>
        </li>
                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>

      <div class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if(Auth::user())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" >{{ __('Log out') }}</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        @endif
      </ul>
      </div>
    </div>
  </div>
</nav>