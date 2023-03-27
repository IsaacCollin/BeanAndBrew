<?php

namespace App\Http\Controllers;

use App\Enum\Category as EnumCategory;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Enums\Category;
use Illuminate\Validation\Rules\Enum;

class RecipeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View
   */
  public function index(Request $request /*,$category = null*/)
  {
    $recipe = Recipe::query();

    // if ($category) {
    //   $recipe->where('category', $category);
    // }

    // Filter by category
    if ($request->has('category')) {
      $recipe->where('category', $request->input('category'));
    }

    // Search by title or content
    if ($request->filled('search')) {
      $search = $request->input('search');
      $recipe->where(function ($query) use ($search) {
        $query->where('title', 'LIKE', "%$search%")
          ->orWhere('content', 'LIKE', "%$search%");
      });
    }

    $recipe = $recipe->orderBy('created_at', 'desc');

    return view('recipes.index', compact('recipe'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|View
   */
  public function create()
  {
    return view('recipes.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
    if (Auth::check() && Auth::user()->administrator == 1) {
      $user = Auth::user();

      $request->validate([
        'title' => 'required|string|unique|max:40',
        'category' => ['required', new Enum(EnumCategory::class)],
        'description' => 'required|string|max:110',
        'body' => 'required|string|max:1000',
        'body_2' => 'required|string|max:1000',
        'body_3' => 'required|string|max:1000',
        'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_alt' => 'required|string|max:40',
        'image_url_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_alt_2' => 'nullable|string|max:40',
        'image_url_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_alt_3' => 'nullable|string|max:40',
      ]);

      // Store the first image
      if ($request->hasFile('image_url')) {
        $image_url = $this->storeImage($request, 1);
      }

      // Store the second image if provided
      $image_url_2 = null;
      if ($request->hasFile('image_url_2')) {
        $image_url_2 = $this->storeImage($request, 2);
      }

      // Store the third image if provided
      $image_url_3 = null;
      if ($request->hasFile('image_url_3')) {
        $image_url_3 = $this->storeImage($request, 3);
      }

      Recipe::create([
        'slug' => Str::slug($request->title),
        'title' => $request->title,
        'category' => $request->enum('category', Category::class),
        'description' => $request->description,
        'body' => $request->body,
        'body_2' => $request->body_2,
        'body_3' => $request->body_3,
        'image_url' => $image_url['image_path'],
        'image_alt' => $image_url['image_alt'],
        'image_url_2' => $image_url_2 ? $image_url_2['image_path_2'] : null,
        'image_alt_2' => $image_url_2 ? $image_url_2['image_alt_2'] : null,
        'image_url_3' => $image_url_3 ? $image_url_3['image_path_3'] : null,
        'image_alt_3' => $image_url_3 ? $image_url_3['image_alt_3'] : null,
        'user_name' => $user->name,
      ]);

      return redirect(route('recipes.index'));
    } else {
      return redirect(route('auth.login'))->withErrors('You do not have the permissions to access this function');
    }
  }

  /**
   * Display the specified resource.
   *
   * @return Application|Factory|View
   * Optional route parameter needs to have a default value eg: $id = 1
   */
  public function show($slug, $category)
  {
    $recipe = Recipe::where('category', $category)
      ->where('slug', $slug)
      ->firstOrFail();

    return view('recipes.show', compact($recipe));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $slug
   * @return Response
   */
  public function update(Request $request, Recipe $slug)
  {
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
  }

private function storeImage($request, $index)
	{
		// Handle image upload
		if ($index == 1) {
			$image = 'image_url';
		} else {
			$image = 'image_url_' . $index;
		}

		if ($request->hasFile($image)) {
			if ($index == 1) {
				$newImageName = uniqid() . '-' . Str::slug($request->title) . '_' . $index . '.' . $request->image_url->extension();
				$imagePath = $request->image_url->storeAs('public/image/posts', $newImageName);
				$imageAlt = $request->has('image_alt') ? $request->image_alt : '';
			} elseif ($index == 2) {
				$newImageName = uniqid() . '-' . Str::slug($request->title) . '_' . $index . '.' . $request->image_url_2->extension();
				$imagePath = $request->image_url_2->storeAs('public/image/posts', $newImageName);
				$imageAlt = $request->has('image_alt') ? $request->image_alt_2 : '';
			} else {
				$newImageName = uniqid() . '-' . Str::slug($request->title) . '_' . $index . '.' . $request->image_url_3->extension();
				$imagePath = $request->image_url_3->storeAs('public/image/posts', $newImageName);
				$imageAlt = $request->has('image_alt') ? $request->image_alt_3 : '';
			}


			if ($index == 1) {
				return [
					'image_path' => 'image/posts/' . $newImageName,
					'image_alt' => $imageAlt
				];
			} else {
				return [
					'image_path_' . $index => 'image/posts/' . $newImageName,
					'image_alt_' . $index => $imageAlt
				];
			}
		}
	}
}
