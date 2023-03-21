<x-head>
  <x-slot:head>
  </x-slot:head>
</x-head>

<body>

  <x-navbar>
  </x-navbar>

  <main>

    @auth
      @if (Auth::user()->administrator == 1)
        <div class="container rounded mt-5 py-5 bg-light">
          <div class="d-flex">
            <h3 class="mb-0 mt-1 ms-5 me-auto">Create a Post</h3>
            <a class="btn btn-secondary fs-6 px-4 py-2 me-3" href="">Edit Article</a>
            <a class="btn btn-secondary fs-6 px-4 py-2 me-5" href="{{ route('posts.create') }}"> Create Article</a>
          </div>
        </div>
      @endif
    @endauth

    <div class="container rounded mt-5 py-5 bg-light">
      <div class="row m-2 text-start">

        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">Location</strong>
              <h3 class="mb-0">Title/Name</h3>
              <div class="mb-1 text-muted">Last updated</div>
              <p class="card-text mb-2">This is a wider card with supporting text below as a natural lead-in to
                additional content. Small Description so if i say a bit more fine 150 words max</p>
              <a href="#" class="btn btn-secondary w-50">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                  fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>
            </div>
          </div>
        </div>

      </div>
    </div>

  </main>

</body>
