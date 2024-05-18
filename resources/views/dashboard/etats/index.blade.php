@extends('layouts.dashboard')

@section('content') 
<!DOCTYPE html>
<html lang="en">

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content container">
            <h1 class="mb-4">Liste des États</h1>

            <a href="{{ route('etats.create') }}" class="btn btn-primary mb-3">Ajouter un État</a>

            @if ($etats->isEmpty())
                <p>Aucun état disponible pour le moment.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>État</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etats as $etat)
                            <tr>
                                <td>{{ $etat->id }}</td>
                                <td>{{ $etat->etat }}</td>
                                <td>
                                    <a href="{{ route('etats.show', $etat->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('etats.edit', $etat->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <form action="{{ route('etats.destroy', $etat->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet état ? Cette action est irréversible !');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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
