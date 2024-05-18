<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Mode de Règlement</title>
</head>
<body>
    <h1>Détails du Mode de Règlement</h1>

    <ul>
        <li>ID: {{ $modereglement->id }}</li>
        <li>Mode de Règlement: {{ $modereglement['mode-reglement'] }}</li>
    </ul>

    <a href="{{ route('modereglements.index') }}">Retour à la liste des modes de règlement</a>
</body>
</html>
