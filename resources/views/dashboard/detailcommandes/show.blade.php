<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la commande</title>
</head>
<body>
    <h1>Détails de la commande</h1>

    <ul>
        <li><strong>ID:</strong> {{ $detailcommande->id }}</li>
        <li><strong>Quantité:</strong> {{ $detailcommande->quantite }}</li>
        <li><strong>Prix HT:</strong> {{ $detailcommande->prix_ht }}</li>
        <li><strong>TVA:</strong> {{ $detailcommande->tva }}</li>
        <li><strong>Produit:</strong> {{ $detailcommande->produit->designation }}</li>
        <li><strong>date de commande:</strong> {{ $detailcommande->commande->date }}</li>
        <!-- Ajoutez d'autres détails de la commande ici -->
    </ul>
</body>
</html>
