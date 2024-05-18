<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une commande</title>
</head>
<body>
    <h1>Modifier une commande</h1>

    <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ $commande->date }}" required>
        </div>

        <div>
            <label for="heure">Heure:</label>
            <input type="time" id="heure" name="heure" value="{{ $commande->heure }}" required>
        </div>

        <div>
            <label for="regle">Payé:</label>
            <select id="regle" name="regle" required>
                <option value="0" {{ $commande->regle == 0 ? 'selected' : '' }}>Non</option>
                <option value="1" {{ $commande->regle == 1 ? 'selected' : '' }}>Oui</option>
            </select>
        </div>

        <!-- Autres champs à modifier -->

        <button type="submit">Enregistrer les modifications</button>
    </form>
</body>
</html>
