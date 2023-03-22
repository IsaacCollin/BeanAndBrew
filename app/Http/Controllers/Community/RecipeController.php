<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('recipes.index');
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
        if (Auth::check() && Auth::user()->is_admin == 1) {
			$user = Auth::user();

			$image = $request->file('image_url');
			$image_name = $user->id . '.' . $image->getClientOriginalExtension();
			$image_url = $image->store('/image/posts', 'public');

			if ($request->hasFile('image_url_2')) {
				$image = $request->file('image_url_2');
				$image_name = $user->id . '.' . $image->getClientOriginalExtension();
				$image_url_2 = $image->store('/image/posts', 'public');

				$request->validate([
					'image_alt_2' => 'required|string|max:40',
					'image_url_2' => 'required|image|mimes:jpeg,png,jpg,svg|max:512',
				]);
			} else {
				return $image_url_2 = null;
			}

			if ($request->hasFile('image_url_3')) {
				$image = $request->file('image_url_3');
				$image_name = $user->id . '.' . $image->getClientOriginalExtension();
				$image_url_3 = $image->store('/image/posts', 'public');

				$request->validate([
					'image_alt_3' => 'required|string|max:40',
					'image_url_3' => 'required|image|mimes:jpeg,png,jpg,svg|max:512',
				]);
			} else {
				return $image_url_3 = null;
			}

			Post::create([
				'slug' => 'show',
				'title' => $request->title,
				'category' => $request->category,
				'description' => $request->description,
				'body' => $request->body,
				'body_2' => $request->body_2,
				'body_3' => $request->body_3,
				'image_url' => $image_url,
				'image_alt' => $request->image_alt,
				'image_url_2' => $image_url_2,
				'image_alt_2' => $request->image_alt_2,
				'image_url_3' => $image_url_3,
				'image_alt_3' => $request->image_alt_3,
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
    public function show()
    {
        return view('recipes.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
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
    
    	private function makeSlug($request)
	{
	}

	private function storeImage($request)
	{
		$newImageName = uniqid() . '-' . $request->title . '.' . $request->image_url->extension();

		return $request->image_url->move(public_path('image/posts'), $newImageName);
	}
}
