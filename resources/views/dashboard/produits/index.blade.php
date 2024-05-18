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
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
    <h1>Liste des Produits</h1>

    <a href="{{ route('produits.create') }}">Ajouter un Produit</a>

    @if ($produits->isEmpty())
        <p>Aucun produit disponible pour le moment.</p>
    @else
        <div class="card-container">
            @foreach ($produits as $produit)
                <div class="card">
                    <h2>{{ $produit->designation }}</h2>
                    @if($produit->image)
                        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->designation }}">
                    @else
                        <p>Pas d'image</p>
                    @endif
                    <p>Prix HT: {{ $produit->prix_ht }}.00 DH</p>
                    <p>Sous-Famille: {{ optional($produit->sousFamille)->libelle }}</p>
                    <p>Unité: {{ optional($produit->unite)->unite }}</p>
                    <div>
                        <a href="{{ route('produits.show', $produit->id) }}"  class="btn btn-info">Voir</a>
                        <a href="{{ route('produits.edit', $produit->id) }}"  class="btn btn-primary">Modifier</a>
                        <form id="deleteForm" action="{{ route('produits.destroy', $produit->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                        </form>
                        
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    </div>
    </div>
</div>
<style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            width: 100%;
        }

        .card h2 {
            margin-top: 0;
        }

        .card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .card p {
            margin: 5px 0;
        }

        .card a {
            margin-right: 10px;
        }

        .card button {
            margin-top: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #c82333;
        }
    </style>
</body>
</html>
@endsection
