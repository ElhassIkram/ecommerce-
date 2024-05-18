@extends('layouts.dashboard')

@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'État</title>
    <!-- Include Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content container">
            <h1>Modifier l'État</h1>

            <form method="POST" action="{{ route('etats.update', $etat->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="etat">État :</label>
                    <input type="text" id="etat" name="etat" class="form-control" value="{{ $etat->etat }}">
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection
