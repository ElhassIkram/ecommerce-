<!-- resources/views/unites/index.blade.php -->

@extends('layouts.dashboard')


@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liste des Unités</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('unites.create') }}" class="btn btn-primary mb-3">Ajouter une Unité</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Unité</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unites as $unite)
                                    <tr>
                                        <th scope="row">{{ $unite->id }}</th>
                                        <td>{{ $unite->unite }}</td>
                                        <td>
                                            <a href="{{ route('unites.show', $unite->id) }}" class="btn btn-info btn-sm">Voir</a>
                                            <a href="{{ route('unites.edit', $unite->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                            <form action="{{ route('unites.destroy', $unite->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette unité ?')">Supprimer</button>
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
</div>

 @endsection 
