@extends('layouts.dashboard')


@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Famille</title>
    <!-- Include Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <h1>Modifier Famille</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('familles.update', $famille->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="libelle">Libellé:</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle', $famille->libelle) }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">
                @if($famille->image)
                    <img src="{{ asset('storage/' . $famille->image) }}" alt="{{ $famille->libelle }}" style="max-width: 200px; margin-top: 10px;">
                @else
                    <p>Pas d'image.</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection
