<x-head>
    <x-slot:head>
        @vite(['resources/js/weather-location.js'])
    </x-slot:head>
</x-head>

<x-navbar>
</x-navbar>

<div class="container mt-5 py-5 bg-light text-center">
    <p>Weather: {{ $weather }}</p>
    <p>Temperature: {{ $temp }} &deg;C</p>
</div>
