<x-head>
  <x-slot:head>
  </x-slot:head>
</x-head>

<body>

  <x-navbar>
  </x-navbar>

  <main>

    <div class="container rounded mt-5 py-5 bg-light">
      <form action="" method="POST">

        <div class="row">

          <div class="col-md-6">
            <div class="form-floating">
              <label for="title">Post Title</label>
              <input class="form-control" type="text" name="title" id="title">
            </div>
          </div>

          <div class="col-md-6">
            <div class="">
              <label for="category" class="form-label d-none">Post category</label>
              <select class="form-select" name="category" id="category">
                <option selected>Select an option</option>
                <option value="1">Bakery</option>
                <option value="2">Breakfast</option>
                <option value="3">Sandwiches and Wraps</option>
                <option value="4">Smoothies and Juices</option>
                <option value="5">Snacks and Desserts</option>
              </select>
            </div>
          </div>

          <div class="form-floating">
            <textarea style="resize: none;" class="form-control" name="body" id="body" rows="5"></textarea>
            <label for="body">Main Text</label>
          </div>

          <div class="">
            <input class="form-control" type="file" name="image_url" id="image_url">
            <label for="image_url">Image</label>
          </div>

          <div class="form-floating">
            <input class="form-control" type="text" name="image_alt" id="image_alt">
            <label for="image_alt">Image Alt</label>
          </div>

          <div class="form-floating">
            <textarea style="resize: none;" class="form-control" name="body_2" id="body_2" rows="5"></textarea>
            <label for="body_2">Second Text</label>
          </div>

          <div class="">
            <input class="form-control" type="file" name="image_url_2" id="image_url_2">
            <label for="image_url_2">Second Image</label>
          </div>

          <div class="form-floating">
            <input class="form-control" type="text" name="image_alt_2" id="image_alt_2">
            <label for="image_alt_2">Second Image Alt</label>
          </div>

        </div>

      </form>
    </div>

  </main>

</body>
