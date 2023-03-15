<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    /*
    * This checks if the user is an admin and if they are it shows the dashboard if they are 
    */
    public function index()
    {
        if (Auth::user()->administrator == 1) {
            return view('shop/dashboard');
        } else {
            return redirect(RouteServiceProvider::HOME)->withErrors('You needed to be an admin to view this');
        }

    }
    
}
