@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-header">
            <h3>Ajouter un Nouvel Utilisateur</h3>
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

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nom :</label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Prénom :</label>
                            <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Adresse :</label>
                            <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ville :</label>
                            <input type="text" name="ville" class="form-control" value="{{ old('ville') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Téléphone :</label>
                    <input type="text" name="tel" class="form-control" value="{{ old('tel') }}" required>
                </div>

                <div class="form-group">
                    <label>Email :</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Mot de passe :</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Confirmer le mot de passe :</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Rôle :</label>
                    <select name="isAdmin" class="form-control">
                        <option value="0">Client</option>
                        <option value="1">Administrateur</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer l'utilisateur</button>
            </form>
        </div>
    </div>
</div>
@endsection