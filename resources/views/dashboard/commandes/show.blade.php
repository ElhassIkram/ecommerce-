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
        <li><strong>ID:</strong> {{ $commande->id }}</li>
        <li><strong>Date:</strong> {{ $commande->date }}</li>
        <li><strong>Heure:</strong> {{ $commande->heure }}</li>
        <li><strong>Payé:</strong> {{ $commande->regle ? 'Oui' : 'Non' }}</li>
        <li><strong>Utilisateur:</strong> {{ $commande->user->nom }} {{ $commande->user->prenom }}</li>
        <li><strong>Mode de règlement:</strong> {{ $commande->modeReglement->{'mode-reglement'} }}</li>
        <li><strong>État:</strong> {{ $commande->etat->etat }}</li>
        <!-- Ajoutez d'autres détails de la commande ici -->
    </ul>

   
</body>
</html>
