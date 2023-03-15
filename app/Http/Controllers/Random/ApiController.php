<?php

namespace App\Http\Controllers\Random;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function geocode($city) {
        $result = Http::get("http://api.openweathermap.org/geo/1.0/direct?q=". urlencode($city) ."&limit=1&appid=74139c626cd4ede0f4dd1f256e9d5ba0");
        $result = json_decode($result);

        return $result;
    }

    public function getWeather(Request $request) {
        $coordinates = $this->geocode($request->location);

        $result = Http::get("http://api.openweathermap.org/data/2.5/weather?lat={$coordinates[0]->lat}&lon={$coordinates[0]->lon}&units=metric&appid=74139c626cd4ede0f4dd1f256e9d5ba0");
        $result = json_decode($result);
        
        return view('api', ['lat' => $coordinates[0]->lat, 'lon' => $coordinates[0]->lon, 'weatherData' => $result]);
    }   
}
