@extends('layouts.dashboard')


@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Famille</title>
    <!-- Include Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <h1>Détails Famille</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Libellé: {{ $famille->libelle }}</h5>
                @if($famille->image)
                    <img src="{{ asset('storage/' . $famille->image) }}" alt="{{ $famille->libelle }}" style="max-width: 200px;">
                @else
                    <p>Pas d'image.</p>
                @endif
            </div>
        </div>

        <a href="{{ route('familles.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
    </div>
    </div>
    </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection