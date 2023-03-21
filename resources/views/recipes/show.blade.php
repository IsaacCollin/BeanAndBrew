<x-head>
  <x-slot:head>
  </x-slot:head>
</x-head>

<body>

  <x-navbar>
  </x-navbar>

 <body>

  <x-navbar>
  </x-navbar>

  <main>

    <div class="container rounded my-2 p-2 mt-5 bg-light">
      <div class="d-flex justify-content-center">
        <nav aria-label="breadcrumb p-2">
          <ol class="breadcrumb mt-3 ms-5">
            <li class="breadcrumb-item fs-5"><a href="{{ route('recipes.index') }}">Posts</a></li>
            <li class="breadcrumb-item active fs-5" aria-current="page">{{ '$Title' }}</li>
          </ol>
        </nav>
        <div class="ms-auto me-auto text-center">
          <h2 class="mt-2 fs-1">{{ 'Title' }}</h2>
        </div>
        <div class="me-5 mt-4">
          <h3 class="fs-6">Writen by {{ '$user_name' }}</h3>
        </div>
      </div>
    </div>

    <div class="container rounded mt-4 py-5 bg-light">

  </main>

  </main>

</body>
