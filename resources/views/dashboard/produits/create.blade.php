@extends('layouts.dashboard')

@section('content') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
            <h1>Ajouter un Produit</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Erreur !</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="codebarre">Code Barre:</label>
                    <input type="text" class="form-control" id="codebarre" name="codebarre" value="{{ old('codebarre') }}">
                </div>
                
                <div class="form-group">
                    <label for="designation">Désignation:</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation') }}">
                </div>

                <div class="form-group">
                    <label for="prix_ht">Prix HT:</label>
                    <input type="text" class="form-control" id="prix_ht" name="prix_ht" value="{{ old('prix_ht') }}">
                </div>

                <div class="form-group">
                    <label for="tva">TVA:</label>
                    <input type="text" class="form-control" id="tva" name="tva" value="{{ old('tva') }}">
                </div>
               
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                 <div class="form-group">
                <label for="sous_famille_id">Sous Famille:</label>
                <select class="form-control" id="sous_famille_id" name="sous_famille_id" required>
                    @foreach ($sousfamilles as $sousfamille)
                        <option value="{{ $sousfamille->id }}">{{ $sousfamille->libelle }}</option>
                    @endforeach
                </select>
            </div>

                <div class="form-group">
                    <label for="marque_id">Marque:</label>
                    <select class="form-control" name="marque_id" id="marque_id">
                        @foreach ($marques as $marque)
                            <option value="{{ $marque->id }}">{{ $marque->marque }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="unite_id">Unité:</label>
                    <select class="form-control" name="unite_id" id="unite_id">
                        @foreach ($unites as $unite)
                            <option value="{{ $unite->id }}">{{ $unite->unite }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
