<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un détail de commande</title>
</head>
<body>
    <h1>Modifier un détail de commande</h1>

    <form action="{{ route('detailcommandes.update', $detailcommande->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="quantite">Quantité:</label>
            <input type="number" id="quantite" name="quantite" value="{{ $detailcommande->quantite }}" required>
        </div>

        <div>
            <label for="prix_ht">Prix HT:</label>
            <input type="number" id="prix_ht" name="prix_ht" step="0.01" value="{{ $detailcommande->prix_ht }}" required>
        </div>

        <div>
            <label for="tva">TVA:</label>
            <input type="number" id="tva" name="tva" step="0.01" value="{{ $detailcommande->tva }}" required>
        </div>

        <!-- Champs pour les clés étrangères -->
        <div>
            <label for="produit_id">Produit:</label>
            <select id="produit_id" name="produit_id" required>
                @foreach ($produits as $produit)
                    <option value="{{ $produit->id }}" {{ $produit->id == $detailcommande->produit->designation ? 'selected' : '' }}>{{ $produit->designation }}</option>
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

        <button type="submit">Enregistrer les modifications</button>
    </form>
</body>
</html>
