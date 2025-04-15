@extends('layouts.dashboard')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <h2 class="mb-4">Liste des Commandes</h2>
        <a href="{{ route('commandes.create') }}" class="btn btn-primary mb-3">Ajouter une commande</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($commandes->isEmpty())
            <div class="alert alert-info">Aucune commande n'est disponible pour le moment.</div>
        @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Payé</th>
                    <th>Utilisateur</th>
                    <th>Mode de règlement</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td>{{ $commande->date }}</td>
                        <td>{{ $commande->heure }}</td>
                        <td>
                            <span class="badge {{ $commande->regle ? 'bg-success' : 'bg-secondary' }}">
                                {{ $commande->regle ? 'Oui' : 'Non' }}
                            </span>
                        </td>
                        <td>{{ $commande->user->nom ?? '' }} {{ $commande->user->prenom ?? '' }}</td>
                        <td>{{ $commande->modeReglement->mode_reglements ?? 'Non spécifié' }}</td>
                        <td>{{ $commande->etat->etat ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ? Cette action est irréversible !');">
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
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection
