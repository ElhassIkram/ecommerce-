@extends('layouts.dashboard')


@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Mode de Règlement</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
    <h1>Ajouter un Mode de Règlement</h1>
    <form method="POST" action="{{ route('modereglements.store') }}">
        @csrf
        <label for="mode-reglement">Mode de Règlement:</label><br>
        <input type="text" id="mode-reglement" name="mode-reglement"><br><br>

        <button type="submit">Ajouter</button>
    </form>
    </div>
    </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection