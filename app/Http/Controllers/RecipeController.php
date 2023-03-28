<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enum\Category;
use App\Models\Recipe;

class RecipeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View
   */
  public function index(Request $request)
  {
    $recipe = Recipe::query();

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
        'category' => ['required', new Enum(Category::class)],
        'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_alt' => 'required|string|max:40',

      ]);

      Recipe::create([
        'slug' => Str::slug($request->title),
        'title' => $request->title,
        'category' => $request->enum('category', Category::class),
        'image_url' => $this->storeImage($request),
        'image_alt' => $request->image_url,

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

  private function storeImage($request)
  {
    // Handle image upload
    $newImageName = uniqid() . '-' . Str::slug($request->title) . $request->image_url->extension();
    $imagePath = $request->image_url->storeAs('public/image/posts', $newImageName);

    return ['image_path' => 'image/posts/' . $newImageName];
  }
}
