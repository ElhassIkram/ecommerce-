<!-- resources/views/produits/index.blade.php -->

@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="card">
                <div class="card-header">Liste des Produits</div>

                <div class="card-body">

                    <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">
                        Ajouter un Produit
                    </a>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                    @if ($produits->isEmpty())
                        <div class="alert alert-warning">
                            Aucun produit disponible pour le moment.
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                           <thead>
                                <tr>
                                    
                                    <th>Image</th>
                                    <th>Code Barre</th>
                                    <th>Désignation</th>
                                    <th>Prix HT</th>
                                    <th>TVA</th>
                                    <th>Description</th>
                                    <th>Marque</th>
                                    <th>Sous-Famille</th>
                                    <th>Unité</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
<tbody>
@foreach ($produits as $produit)
    <tr>

        <td>
            @if($produit->image)
                <img src="{{ asset('storage/' . $produit->image) }}"
                     style="width:70px;height:70px;object-fit:cover;border-radius:5px;margin-bottom:10px;">
            @else
                <span class="text-muted">Pas d'image</span>
            @endif
        </td>

        <td>{{ $produit->codebarre }}</td>
        <td>{{ $produit->designation }}</td>
        <td>{{ $produit->prix_ht }} DH</td>
        <td>{{ $produit->tva }}%</td>
        <td>{{ $produit->description }}</td>

        <td>{{ optional($produit->marque)->marque }}</td>
        <td>{{ optional($produit->sousFamille)->libelle }}</td>
        <td>{{ optional($produit->unite)->unite }}</td>

        <td>
            <a href="{{ route('produits.edit', $produit->id) }}" class="text-blue-500 hover:text-blue-700 me-8">
                <i class="fas fa-pen text-2xl"></i>
            </a>

            <form action="{{ route('produits.destroy', $produit->id) }}"
                  method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette produit ?')"
                class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash text-2xl"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection