@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="card">

                <div class="card-header">
                    Liste des Marques
                </div>

                <div class="card-body">

                    <a href="{{ route('marques.create') }}" class="btn btn-primary mb-3">
                        Ajouter une Marque
                    </a>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($marques as $marque)
                                <tr>
                                    <td>{{ $marque->marque }}</td>

                                    <td>
                                        <!-- Voir (optionnel) -->
                                         <!--  <a href="{{ route('marques.show', $marque->id) }}"
                                           class="text-info me-3">
                                            <i class="fas fa-eye text-2xl"></i>
                                        </a>-->

                                        <!-- Modifier -->
                                        <a href="{{ route('marques.edit', $marque->id) }}"
                                           class="text-blue-500 hover:text-blue-700 me-8">
                                            <i class="fas fa-pen text-2xl"></i>
                                        </a>

                                        <!-- Supprimer -->
                                        <form action="{{ route('marques.destroy', $marque->id) }}"
                                              method="POST"
                                              style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette marque ?')"
                                                    class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash text-2xl"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        Aucune marque n’a été ajoutée
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection