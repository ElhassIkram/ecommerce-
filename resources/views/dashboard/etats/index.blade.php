@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="card">
                <div class="card-header">
                    Liste des États
                </div>

                <div class="card-body">

                    <a href="{{ route('etats.create') }}" class="btn btn-primary mb-3">
                        Ajouter un État
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
                                <th>État</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($etats as $etat)
                                <tr>

                                    <td>{{ $etat->etat }}</td>

                                    <td>
                                          <!-- <a href="{{ route('etats.show', $etat->id) }}"
                                           class="text-info me-3">
                                            <i class="fas fa-eye"></i>
                                        </a>-->

                                        <a href="{{ route('etats.edit', $etat->id) }}"
                                            class="text-blue-500 hover:text-blue-700 me-8">
                                            <i class="fas fa-pen text-2xl"></i>
                                        </a>

                                        <form action="{{ route('etats.destroy', $etat->id) }}"
                                              method="POST"
                                              style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                              onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette état ?')"
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