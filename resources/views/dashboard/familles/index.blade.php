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
        <h2>Liste des Familles</h2>
        <a href="{{ route('familles.create') }}" class="btn btn-primary mb-3">Ajouter une famille</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                <th></th>
                    <th>Libellé</th>
                   
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($familles as $famille)
                    <tr>
                    <td>
                            @if($famille->image)
                                <img src="{{ asset('storage/' . $famille->image) }}" alt="{{ $famille->libelle }}" style="max-width: 100px;">
                            @else
                                Pas d'image
                            @endif
                        </td>
                        <td>{{ $famille->libelle }}</td>
                       
                        <td>
                            <!-- <a href="{{ route('familles.show', $famille->id) }}" class="btn btn-info">Voir</a> -->
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
<style>
    td img {
        width: 70px;
        height: 70px;
        object-fit: cover; /* Assure que l'image remplit l'espace sans être déformée */
        border-radius: 3px; /* Optionnel : ajoute des bords arrondis pour un meilleur rendu */
        margin-top: 10px; /* Ajoute un espacement au-dessus de l'image */
    }
</style>
