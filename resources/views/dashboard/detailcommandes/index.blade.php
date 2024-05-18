@extends('layouts.dashboard')

@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des détails de commande</title>
</head>
<body>
    <h1>Liste des détails de commande</h1>

    <a href="{{ route('detailcommandes.create') }}">Ajouter un détail de commande</a>

    @if ($detailcommandes->isEmpty())
        <p>Aucun détail de commande disponible pour le moment.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Quantité</th>
                    <th>Prix HT</th>
                    <th>TVA</th>
                    <th>Produit</th>
                    <th>Commande</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailcommandes as $detailcommande)
                    <tr>
                        <td>{{ $detailcommande->id }}</td>
                        <td>{{ $detailcommande->quantite }}</td>
                        <td>{{ $detailcommande->prix_ht }}</td>
                        <td>{{ $detailcommande->tva }}</td>
                        <td>{{ $detailcommande->produit->designation }}</td> <!-- Utilisation de la relation pour afficher le nom du produit -->
                        <td>{{ $detailcommande->commande->date }}</td> <!-- Affichage de l'ID de la commande -->
                        <td>
                            <a href="{{ route('detailcommandes.show', $detailcommande->id) }}">Voir</a>
                            <a href="{{ route('detailcommandes.edit', $detailcommande->id) }}">Modifier</a>
                            <form action="{{ route('detailcommandes.destroy', $detailcommande->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce détail de commande ? Cette action est irréversible !');">
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