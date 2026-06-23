@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-header">
            <h3>Modifier l'utilisateur : {{ $user->nom }} {{ $user->prenom }}</h3>
        </div>
        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nom :</label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom', $user->nom) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Prénom :</label>
                            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $user->prenom) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Adresse :</label>
                            <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $user->adresse) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ville :</label>
                            <input type="text" name="ville" class="form-control" value="{{ old('ville', $user->ville) }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Téléphone :</label>
                    <input type="text" name="tel" class="form-control" value="{{ old('tel', $user->tel) }}" required>
                </div>

                <div class="form-group">
                    <label>Email :</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label>Nouveau mot de passe (laisser vide pour ne pas changer) :</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Rôle :</label>
                    <select name="isAdmin" class="form-control">
                        <option value="0" {{ $user->isAdmin == 0 ? 'selected' : '' }}>Client</option>
                        <option value="1" {{ $user->isAdmin == 1 ? 'selected' : '' }}>Administrateur</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
</div>
@endsection