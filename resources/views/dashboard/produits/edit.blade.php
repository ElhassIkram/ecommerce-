<!-- resources/views/produits/edit.blade.php -->

@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header">
                            Modifier le Produit
                        </div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('produits.update', $produit->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Code Barre -->
                                <div class="form-group">
                                    <label>Code Barre</label>
                                    <input type="text" class="form-control" name="codebarre" value="{{ old('codebarre', $produit->codebarre) }}">
                                    @error('codebarre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Désignation -->
                                <div class="form-group">
                                    <label>Désignation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ old('designation', $produit->designation) }}">
                                    @error('designation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Prix HT -->
                                <div class="form-group">
                                    <label>Prix HT</label>
                                    <input type="text" class="form-control" name="prix_ht" value="{{ old('prix_ht', $produit->prix_ht) }}">
                                    @error('prix_ht')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- TVA -->
                                <div class="form-group">
                                    <label>TVA</label>
                                    <input type="text" class="form-control" name="tva" value="{{ old('tva', $produit->tva) }}">
                                    @error('tva')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description">{{ old('description', $produit->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control-file" name="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    @if($produit->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$produit->image) }}"
                                                 style="width:80px;height:80px;object-fit:cover;border-radius:6px;">
                                        </div>
                                    @endif
                                </div>

                                <!-- Sous Famille -->
                                <div class="form-group">
                                    <label>Sous Famille</label>
                                    <select class="form-control" name="sous_famille_id">
                                        @foreach($sousfamilles as $sousfamille)
                                            <option value="{{ $sousfamille->id }}"
                                                {{ $produit->sous_famille_id == $sousfamille->id ? 'selected' : '' }}>
                                                {{ $sousfamille->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sous_famille_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Marque -->
                                <div class="form-group">
                                    <label>Marque</label>
                                    <select class="form-control" name="marque_id">
                                        @foreach($marques as $marque)
                                            <option value="{{ $marque->id }}"
                                                {{ $produit->marque_id == $marque->id ? 'selected' : '' }}>
                                                {{ $marque->marque }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('marque_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Unité -->
                                <div class="form-group">
                                    <label>Unité</label>
                                    <select class="form-control" name="unite_id">
                                        @foreach($unites as $unite)
                                            <option value="{{ $unite->id }}"
                                                {{ $produit->unite_id == $unite->id ? 'selected' : '' }}>
                                                {{ $unite->unite }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('unite_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Mettre à jour
                                </button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection