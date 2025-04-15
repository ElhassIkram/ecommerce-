@extends('layouts.dashboard')

@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Modes de Règlement</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
    <h1>Liste des Modes de Règlement</h1>

    <a href="{{ route('modereglements.create') }}">Ajouter un Mode de Règlement</a>

    @if ($modereglements->isEmpty())
        <p>Aucun mode de règlement disponible pour le moment.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mode de Règlement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modereglements as $modereglement)
                    <tr>
                        <td>{{ $modereglement->id }}</td>
                        <td>{{ $modereglement->{"mode_reglements"} }}</td>
                        

                        <td>
                            <a href="{{ route('modereglements.show', $modereglement->id) }}">Voir</a>
                            <a href="{{ route('modereglements.edit', $modereglement->id) }}">Modifier</a>
                            <form action="{{ route('modereglements.destroy', $modereglement->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>
    </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection