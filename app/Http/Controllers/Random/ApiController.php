<?php

namespace App\Http\Controllers\Random;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getWeather(Request $request)
    {
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        //$result = Http::get("http://api.openweathermap.org/data/2.5/weather?lat={$coordinates[0]->lat}&lon={$coordinates[0]->lon}&units=metric&appid=74139c626cd4ede0f4dd1f256e9d5ba0");


        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?', ['lat' => $lat, 'lon' => $lng,], '&units=metric&appid=74139c626cd4ede0f4dd1f256e9d5ba0');

        $data = $response->json();

        $weather = $data['weather'][0]['description'];
        $temp = $data['main']['temp'];

        return view('api', ['weather' => $weather, 'temp' => $temp]);
    }
}
