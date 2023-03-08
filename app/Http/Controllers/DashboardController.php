<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        if ($user->administrator) {
            return view('shop/dashboard');
        } else {
            return redirect(RouteServiceProvider::HOME)->withErrors('You needed to be an admin to view this');
        }
    }
}
