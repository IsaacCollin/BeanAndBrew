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
            <a class="btn btn-secondary fs-6 px-4 py-2 me-5" href="{{ route('recipes.create') }}"> Create Article</a>
          </div>
        </div>
      @endif
    @endauth

    <div class="container rounded mt-5 py-5 bg-light">

      <div class="row m-2 text-start">

        @foreach ($recipe as $recipe)
          <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-3 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">{{ $recipe->category }}</strong>
                <h3 class="mb-1">{{ $recipe->title }}</h3>
                <div class="mb-1 text-muted">{{ $recipe->updated_at->diffForHumans() }}</div>
                <p class="card-text mb-2">{{ $recipe->description }}</p>
                <a href="{{ route('recipes.show', ['category' => $post->category, 'slug' => $post->slug]) }}">Continue
                  reading</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="{{ '/storage/' . $recipe->image_url }}" alt="{{ $recipe->image_alt }}" height="250"
                  width="200">
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>

  </main>

</body>
