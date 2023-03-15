<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bean & Brew</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
    {{ $head }}
</head>
