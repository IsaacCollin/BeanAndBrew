<x-head>
    <x-slot:head>
        @vite(['resources/js/weather-location.js'])
    </x-slot:head>
</x-head>

<x-navbar>
</x-navbar>

<div class="container mt-5 py-5 bg-light text-center">
    <h5>
        Latitude: {{ $lat }}
        Longitdue: {{ $lon }}
    </h5>

    <img src="https://openweathermap.org/img/wn/{{ $weatherData->weather[0]->icon }}@2x.png">
    <h5>{{ $weatherData->weather[0]->main }}</h5>
    <br>
    <br>
    <h5>Feels like: {{ round($weatherData->main->feels_like) }} degrees</h5>
    {{ $weatherData->name }}

    <p class="location"></p>
</div>
