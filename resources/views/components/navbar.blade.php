<body>
  <nav class="navbar navbar-expand-lg bg-light" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11"
        aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
        <a class="navbar-brand col-lg-3 me-0 nt-text text-center" href="{{ url('home') }}">Bean & Brew</a>
        <ul class="navbar-nav col-lg-6 justify-content-lg-center ni-text">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('shop.menu') }}">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Booking
              <i class="fa-solid fa-book"></i></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item ddi-text" href="#">Book a Table</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item ddi-text" href="#">Baking Lessons</a></li>
            </ul>
          </li>
          <li class="nav-item">
            {{-- , ['category' => 'bakery'] --}}
            <a class="nav-link" href="{{ route('recipes.index') }}">Recipes</a>
          </li>
        </ul>
        <div class="d-lg-flex col-lg-3 justify-content-lg-center">
          <ul class="navbar-nav col-lg-6 justify-content-lg-center ni-text">
            <li class="nav-item dropdown">
              <label class="d-none" for="profile">Profile Dropdown</label>
              @auth
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa-solid fa-user fa-xl"></i></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item ddi-text" href="#">Account</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  @if (Auth::user()->administrator == 1)
                    <li><a class="dropdown-item ddi-text" href="{{ route('shop.dashboard') }}">Dashboard</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                  @endif
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="dropdown-item ddi-text" href="route('logout')"
                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        Log Out
                      </a>
                    </form>
                  </li>
                </ul>
              @else
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa-regular fa-user fa-lg"></i></i></a>
                <ul class="dropdown-menu ddi-text">
                  <li><a class="dropdown-item ddi-text" href="{{ route('auth.login') }}">Login</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item ddi-text" href="{{ route('auth.register') }}">Register</a>
                  </li>
                </ul>
              @endauth
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</body>
