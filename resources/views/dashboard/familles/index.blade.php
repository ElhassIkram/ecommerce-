<!-- resources/views/familles/index.blade.php -->
@extends('layouts.dashboard')


@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Familles</title>
    <!-- Include Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <h1>Liste des Familles</h1>
        <a href="{{ route('familles.create') }}" class="btn btn-primary mb-3">Ajouter une famille</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($familles as $famille)
                    <tr>
                        <td>{{ $famille->id }}</td>
                        <td>{{ $famille->libelle }}</td>
                        <td>
                            @if($famille->image)
                                <img src="{{ asset('storage/' . $famille->image) }}" alt="{{ $famille->libelle }}" style="max-width: 100px;">
                            @else
                                Pas d'image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('familles.show', $famille->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('familles.edit', $famille->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('familles.destroy', $famille->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette famille ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection
