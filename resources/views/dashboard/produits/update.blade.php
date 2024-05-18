@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mettre à jour le produit</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('produits.update', $produit->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="codebarre">Codebarre</label>
                                <input type="text" name="codebarre" id="codebarre" class="form-control" value="{{ $produit->codebarre }}">
                            </div>

                            <div class="form-group">
                                <label for="designation">Désignation</label>
                                <input type="text" name="designation" id="designation" class="form-control" value="{{ $produit->designation }}">
                            </div>

                            <div class="form-group">
                                <label for="prix_ht">Prix HT</label>
                                <input type="number" name="prix_ht" id="prix_ht" class="form-control" value="{{ $produit->prix_ht }}">
                            </div>

                            <div class="form-group">
                                <label for="tva">TVA</label>
                                <input type="number" name="tva" id="tva" class="form-control" value="{{ $produit->tva }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $produit->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="sous_famille_id">Sous-famille</label>
                                <select name="sous_famille_id" id="sous_famille_id" class="form-control">
                                    @foreach($sousfamilles as $sousfamille)
                                        <option value="{{ $sousfamille->id }}" {{ $sousfamille->id == $produit->sous_famille_id ? 'selected' : '' }}>{{ $sousfamille->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="marque_id">Marque</label>
                                <select name="marque_id" id="marque_id" class="form-control">
                                    @foreach($marques as $marque)
                                        <option value="{{ $marque->id }}" {{ $marque->id == $produit->marque_id ? 'selected' : '' }}>{{ $marque->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="unite_id">Unité</label>
                                <select name="unite_id" id="unite_id" class="form-control">
                                    @foreach($unites as $unite)
                                        <option value="{{ $unite->id }}" {{ $unite->id == $produit->unite_id ? 'selected' : '' }}>{{ $unite->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Mettre à jour le produit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
