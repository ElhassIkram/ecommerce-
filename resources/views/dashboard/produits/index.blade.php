@extends('layouts.dashboard')

@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
</head>
<body>
<div >
    <div class="main-wrapper">
        <div class="main-content">
            <h1>Liste des Produits</h1>

            <a class="btn btn-info" href="{{ route('produits.create') }}">Ajouter un Produit</a>

            @if ($produits->isEmpty())
                <p>Aucun produit disponible pour le moment.</p>
            @else
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Désignation</th>
                            <th>Prix HT</th>
                            <th>Sous-Famille</th>
                            <th>Unité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td>
                                    @if($produit->image)
                                        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->designation }}" style="width: 70px; height: 70px; object-fit: cover;">
                                    @else
                                        <p>Pas d'image</p>
                                    @endif
                                </td>
                                <td>{{ $produit->designation }}</td>
                                <td>{{ $produit->prix_ht }}.00 DH</td>
                                <td>{{ optional($produit->sousFamille)->libelle }}</td>
                                <td>{{ optional($produit->unite)->unite }}</td>
                                <td>
                                    <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
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

<style>
    .table th, .table td {
        text-align: center;
    }
    .table img {
        width: 70px;
        height: 70px;
        object-fit: cover;
    }
</style>
</body>
</html>
@endsection
