<x-head>
  <x-slot:head>
  </x-slot:head>
</x-head>

<body>

  <x-navbar>
  </x-navbar>

  <main>

    <div class="container rounded mt-5 p-4 bg-light">
      <h1 class="m-1 ms-2">Create a Post</h1>

      <form action="" method="POST">

        <div class="row g-4 mx-3 my-1">

          <h3 class="text-start mt-5">Required:</h3>

          <div class="col-6">
            <input type="text" class="form-control" name="title" id="title" placeholder="Post Title">
            <label class="d-none" for="title">Post Title</label>
          </div>

          <div class="col-6">
            <label for="category" class="form-label d-none">Select an option</label>
            <select class="form-select" name="category" id="category">
              <option selected>Select an option</option>
              <option value="1">Bakery</option>
              <option value="2">Breakfast</option>
              <option value="3">Sandwiches and Wraps</option>
              <option value="4">Smoothies and Juices</option>
              <option value="5">Snacks and Desserts</option>
            </select>
          </div>

          <div class="col-12">
            <input type="text" class="form-control" name="description" id="description"
              placeholder="Description of Post">
            <label class="d-none" for="description">Description of Post</label>
          </div>

          <div class="col-12">
            <textarea style="resize: none" class="form-control" name="body" placeholder="Body" id="Body" rows="5"></textarea>
            <label class="d-none" for="Body">Body</label>
          </div>

          <div class="col-6">
            <input class="form-control" type="file" name="image_url" id="image_url">
            <label class="d-none" for="image_url">Image</label>
          </div>

          <div class="col-6">
            <input class="form-control" type="text" name="image_alt" id="image_alt" placeholder="Image Alt Tag">
            <label class="d-none" for="image_alt">Image Alt Tag</label>
          </div>

          <div class="col-12">
            <textarea style="resize: none;" class="form-control" name="body_2" placeholder="Second Body" id="body_2"
              rows="5"></textarea>
            <label class="d-none" for="body_2">Second Text</label>
          </div>

          <div class="col-12">
            <textarea style="resize: none;" class="form-control" name="body_2" placeholder="Third Body" id="body_2"
              rows="5"></textarea>
            <label class="d-none" for="body_2">Third Text</label>
          </div>

          <h3 class="text-start mt-5">Optional:</h3>

          <div class="col-6">
            <input class="form-control" type="file" name="image_url_2" id="image_url_2 ">
            <label class="d-none" for="image_url_2">Second Image</label>
          </div>

          <div class="col-6">
            <input class="form-control" type="text" name="image_alt_2" id="image_alt_2"
              placeholder="Second Image Alt Tag">
            <label class="d-none" for="image_alt_2">Second Image Alt Tag</label>
          </div>

          <div class="col-6">
            <input class="form-control" type="file" name="image_url_3" id="image_url_3 ">
            <label class="d-none" for="image_url_2">Third Image</label>
          </div>

          <div class="col-6">
            <input class="form-control" type="text" name="image_alt_3" id="image_alt_3"
              placeholder="Third Image Alt Tag">
            <label class="d-none" for="image_alt_2">Third Image Alt Tag</label>
          </div>

          <div class="col-6 text-start mt-5">
            <button type="submit" class="btn btn-secondary w-50">Submit Post</button>
          </div>

        </div>

      </form>
    </div>

  </main>

</body>
