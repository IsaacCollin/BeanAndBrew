<x-head>
  <x-slot:head>
  </x-slot:head>
</x-head>

<body>

  <x-navbar />

  <main>

    <div class="container rounded mt-5 p-4 bg-light">
      <h1 class="m-1 ms-2">Create a Post</h1>

      <form action="{{ route('recipe.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
          <div class="toast bg-danger bg-gradient text-start text-white fade show">
            <div class="toast-header bg-danger text-white">
              <strong class="me-auto">Errors</strong>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </div>
          </div>
        @endif

        <div class="row g-4 mx-3 mb-4 my-1">

          <h3 class="text-start mt-5">Required:</h3>

          <div class="col-md-7">
            <input type="text" class="form-control" name="title" id="title" placeholder="Post Title" required>
            <label class="d-none" for="title">Post Title</label>
          </div>

          <div class="col-md-6">
            <input type="file" class="form-control" name="image_url" id="image_url" placeholder="Thumbnail Image"
              required>
            <label class="d-none" for="image_url">Thumbnail Image</label>
          </div>

          <div class="col-md-4">
            <input type="text" class="form-control" name="image_alt" id="image_alt"
              placeholder="Thumbnail Image Alt Tag" required>
            <label class="d-none" for="image_alt">Thumbnail Image Alt Tag</label>
          </div>

          <div class="col-md-2">
            <select class="form-select" name="category" id="category" required>
              <option selected>Select an option</option>
              <option value="Bakery">Bakery</option>
              <option value="Breakfast">Breakfast</option>
              <option value="Sandwiches">Sandwiches</option>
              <option value="Wraps">Wraps</option>
              <option value="Smoothies">Smoothies</option>
              <option value="Snacks">Snacks</option>
              <option value="Desserts">Desserts</option>
            </select>
            <label class="d-none" for="category">Select an option</label>
          </div>

          <div class="col-12 mt-5">
            <x-rich-text-trix-styles />
            <x-trix-field id="post_body" name="body" />
            <label class="d-none" for="post_body">Description of Post</label>
          </div>

          <div class="col-6 text-start mt-5">
            <button type="submit" class="btn btn-secondary w-50">Submit Post</button>
          </div>

        </div>

      </form>
    </div>

  </main>

</body>
