<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

            

            Reci::create([
                'slug' => Str::slug($request->title),
                'title' => $request->title,
                'category' => $request->category,
                'description' => $request->description,
                'body' => $request->body,
                'body_2' => $request->body_2,
                'body_3' => $request->body_3,
                'image_url' => $this->$request->$newImageName,
                'image_alt' => $request->image_alt,
                'image_url_2' => '$image_url_2',
                'image_alt_2' => $request->image_alt_2,
                'image_url_3' => '$image_url_3',
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

    private function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image_url->extension();

        return $request->image_url->move(public_path('image/posts'), $newImageName);
    }
}
