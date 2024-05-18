@extends('layouts.dashboard')

@section('content')
<div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <h1>Détails Utilisateur</h1>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nom: {{ $user->nom }}</h5>
                        <p class="card-text">Prénom: {{ $user->prenom }}</p>
                        <p class="card-text">Adresse: {{ $user->adresse }}</p>
                        <p class="card-text">Ville: {{ $user->ville }}</p>
                        <p class="card-text">Email: {{ $user->email }}</p>
                        <p class="card-text">Téléphone: {{ $user->tell }}</p>
                        <p class="card-text">Admin: {{ $user->isAdmin ? 'Yes' : 'No' }}</p>
                    </div>
                </div>

                <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection
