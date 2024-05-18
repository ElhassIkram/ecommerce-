@extends('layouts.dashboard')
@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une commande</title>
</head>
<body>
    <h1>Créer une commande</h1>

    <form action="{{ route('commandes.store') }}" method="POST">
        @csrf

        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div>
            <label for="heure">Heure:</label>
            <input type="time" id="heure" name="heure" required>
        </div>

        <div>
            <label for="regle">Payé:</label>
            <select id="regle" name="regle" required>
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <div>
            <label for="user_id">Utilisateur:</label>
            <select id="user_id" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div>  
                        

            <label for="mode_reglement_id">Mode de règlement:</label>
            <select id="mode_reglement_id" name="mode_reglement_id" required>
                @foreach ($modesReglement as $modeReglement)
                    <option value="{{ $modeReglement->id }}">{{ $modeReglement->{"mode-reglement"} }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="etat_id">État:</label>
            <select id="etat_id" name="etat_id" required>
                @foreach ($etats as $etat)
                    <option value="{{ $etat->id }}">{{ $etat->etat }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Créer la commande</button>
    </form>
</body>
</html>
@endsection