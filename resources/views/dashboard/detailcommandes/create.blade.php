@extends('layouts.dashboard')

@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un détail de commande</title>
</head>
<body>
    <h1>Ajouter un détail de commande</h1>

    <form action="{{ route('detailcommandes.store') }}" method="POST">
        @csrf

        <div>
            <label for="quantite">Quantité:</label>
            <input type="number" id="quantite" name="quantite" required>
        </div>

        <div>
            <label for="prix_ht">Prix HT:</label>
            <input type="number" id="prix_ht" name="prix_ht" step="0.01" required>
        </div>

        <div>
            <label for="tva">TVA:</label>
            <input type="number" id="tva" name="tva" step="0.01" required>
        </div>

        <div>
            <label for="produit_id">Produit:</label>
            <select id="produit_id" name="produit_id" required>
                @foreach ($produits  as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="produit_id">commande:</label>
            <select id="commande_id" name="commande_id" required>
                @foreach ($commandes as $commande)
                    <option value="{{ $commande->id }}">{{ $commande->date }}</option>
                @endforeach
            </select>
        </div>

       

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
@endsection