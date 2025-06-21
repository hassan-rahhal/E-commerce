<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Tech-shop</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/search">Products</a>
          </li>
        </ul>
        <div class="d-flex justify-content-between w-100">
          
          <form class="d-flex" method="POST" action="/test">
            @csrf
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="keyword"
              id="search"
            />
            <button class="btn btn-outline-success" type="button" onclick="searchTest()">
              Search
            </button>
          </form>
          <div class="d-flex align-items-center justify-content-between">
            @guest
                <a class="btn btn-primary me-2" href="{{route('login')}}">Login</a>
                <a class="btn btn-primary me-2" href="{{route('register')}}">Register</a>
            @endguest
            @auth
                @if(auth()->user()->is_admin)
                    <a href="/admin" class="btn btn-secondary me-2"> Admin Panel </a>
                @endif
                <a href="/cart" class="btn btn-secondary me-2"> Cart </a>
                <a href="{{route('logout')}}" class="btn btn-secondary me-2"> Logout </a>
            @endauth
            <a href="/cart" class="btn btn-secondary me-2">Cart</a>

          </div>
        </div>
      </div>
    </div>
  </nav>

  <script>
    function searchTest(){
      const k = document.getElementById('search').value.trim();
      if(k){
        window.location.href = "/search/" + k;
      }
    }
    </script>