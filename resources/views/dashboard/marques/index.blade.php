@extends('layouts.dashboard')

@section('content') 
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <h1>Liste des marques</h1>
        <a href="{{ route('marques.create') }}" class="btn btn-primary mb-3">Ajouter une marque</a>
        @if ($marques->count() > 0)
            <ul class="list-group">
                @foreach ($marques as $marque)
                    <li class="list-group-item">{{ $marque->marque }}
                        <div class="float-right">
                            <a href="{{ route('marques.show', $marque->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('marques.edit', $marque->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('marques.destroy', $marque->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette marque ?')">Supprimer</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucune marque n'a été ajoutée.</p>
        @endif
    </div>
    </div>
    </div>
    </div>
@endsection 
