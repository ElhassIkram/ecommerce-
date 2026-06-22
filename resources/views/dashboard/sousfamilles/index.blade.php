<!-- resources/views/sousfamilles/index.blade.php -->

@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="card">

                <div class="card-header">
                    Liste des Sous-Familles
                </div>

                <div class="card-body">

                    <a href="{{ route('sousfamilles.create') }}" class="btn btn-primary mb-3">
                        Ajouter une Sous-Famille
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

                    <table class="table"  id="table-1">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Libellé</th>
                                <th>Famille</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($sousfamilles as $sousfamille)
                                <tr>

                                    <td>
                                        @if($sousfamille->image)
                                            <img src="{{ asset('storage/' . $sousfamille->image) }}"
                                                 alt="{{ $sousfamille->libelle }}"
                                                 style="width:70px;height:70px;object-fit:cover;border-radius:5px;margin-bottom:10px;">
                                        @else
                                            <span class="text-muted">Pas d'image</span>
                                        @endif
                                    </td>

                                    <td>{{ $sousfamille->libelle }}</td>

                                    <td>
                                        @if ($sousfamille->famille)
                                            {{ $sousfamille->famille->libelle }}
                                        @else
                                            <span class="text-muted">Aucune famille</span>
                                        @endif
                                    </td>

                                    <td>
                                        <!-- Modifier -->
                                        <a href="{{ route('sousfamilles.edit', $sousfamille->id) }}"
                                           class="text-blue-500 hover:text-blue-700 me-8">
                                            <i class="fas fa-pen text-2xl"></i>
                                        </a>

                                        <!-- Supprimer -->
                                        <form action="{{ route('sousfamilles.destroy', $sousfamille->id) }}"
                                              method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sous-famille ?')"
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
@endsection