@extends('layouts.dashboard')

@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
</head>
<body>
    <h1>Liste des commandes</h1>

    <a href="{{ route('commandes.create') }}">Ajouter une commande</a>

    @if ($commandes->isEmpty())
        <p>Aucune commande n'est disponible pour le moment.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
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
                        <td>{{ $commande->id }}</td>
                        <td>{{ $commande->date }}</td>
                        <td>{{ $commande->heure }}</td>
                        <td>{{ $commande->regle ? 'Oui' : 'Non' }}</td>
                        <td>{{ $commande->user->nom }} {{ $commande->user->prenom }}</td>
                        <td>{{ $commande->modeReglement->{"mode-reglement"} }}</td>
                        <td>{{ $commande->etat->etat }}</td>
                        <td>
                            <a href="{{ route('commandes.show', $commande->id) }}">Voir</a>
                            <a href="{{ route('commandes.edit', $commande->id) }}">Modifier</a>
                            <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ? Cette action est irréversible !');">
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
</body>
</html>
@endsection 

