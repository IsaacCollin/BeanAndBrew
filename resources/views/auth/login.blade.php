<x-head>
  <x-slot:head>
  </x-slot:head>
</x-head>


<body class="text-center">
  <nav class="navbar navbar-expand-lg bg-light" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11"
        aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
        <a class="navbar-brand col-lg-3 me-0 nt-text" href="{{ url('home') }}">Bean & Brew</a>
        <div class="navbar-brand col-lg-6 justify-content-lg-center ni-text">
        </div>
        <ul class="navbar-nav col-lg-3 justify-content-lg-center ni-text">
          <li class="nav-item">
            <a class="nav-link ni-text" href="./register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active ni-text" aria-current="page" href="./login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <main class="form-auth w-100 h-100 m-auto">
    <div class="container d-flex h-100">
      <div class="form-auth-bg row justify-content-center align-self-center ">
        <h1 class="p-2">Login</h1>
        <form method="POST">
          @csrf
          <div class="form-floating">
            <input class="form-control" type="text" placeholder="Email" id="inputEmail" name="email" required
              autofocus>
            <label for="inputEmail">Email address</label>
          </div>
          <div class="form-floating">
            <input class="form-control" type="password" placeholder="Password" id="inputPassword" name="password"
              required>
            <label for="inputPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
        <div>Do you need an account?
          <a href="{{ route('auth.register') }}">Register</a>
        </div>
      </div>
    </div>
  </main>
</body>
