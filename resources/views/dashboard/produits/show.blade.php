@extends('layouts.dashboard')


@section('content')
    
<div class="container">
        <div class="card">
            <div class="card-header">Détails du produit</div>
        @foreach($produit as $produits)
            <div class="card-body">
                <h5>Codebarre: {{ $produits->codebarre }}</h5>
                <h5>Désignation: {{ $produits->designation }}</h5>
                <h5>Prix HT: {{ $produits->prix_ht }}</h5>
                <h5>TVA: {{ $produits->tva }}</h5>
                <h5>Description: {{ $produits->description }}</h5>
                <h5>image de produit 
                @if($produits->image)
                    <img src="{{ asset('storage/' . $produits->image) }}" alt="Product Image" style="max-width: 300px;">
                @else
                    <p>Aucune image disponible.</p>
                @endif
            </h5>
                <h5>Sous-famille: {{ $produits->sousFamille->libelle }}</h5>
                <h5>Marque: {{ $produits->marque->marque }}</h5>
                <h5>Unité: {{ $produits->unite->unite }}</h5>
            </div>
            @endforeach
        </div>
    </div>
@endsection

