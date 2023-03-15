<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Providers\RouteServiceProvider;

class MenuController extends Controller
{
  public function create()
  {
    $menu = Menu::all();

    return view('shop/menu', ['menu' => $menu]);
  }

  public function store()
  {
  }
}
