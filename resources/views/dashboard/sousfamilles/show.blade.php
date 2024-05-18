<!-- resources/views/sousfamilles/index.blade.php -->

@extends('layouts.dashboard')


@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <h1>Liste des Sous-Familles</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('sousfamilles.create') }}" class="btn btn-primary mb-3">Ajouter une Sous-Famille</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Image</th>
                    <th>Famille</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sousfamilles as $sousfamille)
                    <tr>
                        <td>{{ $sousfamille->id }}</td>
                        <td>{{ $sousfamille->libelle }}</td>
                        <td>
                            @if($sousfamille->image)
                                <img src="{{ asset('storage/' . $sousfamille->image) }}" alt="{{ $sousfamille->libelle }}" style="max-width: 100px;">
                            @else
                                <p>Pas d'image</p>
                            @endif
                        </td>
                        <td>{{ $sousfamille->famille->libelle }}</td>
                        <td>
                            <a href="{{ route('sousfamilles.edit', $sousfamille->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('sousfamilles.destroy', $sousfamille->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sous-famille ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
