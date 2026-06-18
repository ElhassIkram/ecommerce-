<!-- resources/views/unites/index.blade.php -->

@extends('layouts.dashboard')


@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
       
    <div class="card">
                    <div class="card-header">Liste des Unités</div>

                    <div class="card-body">

                        <a href="{{ route('unites.create') }}" class="btn btn-primary mb-3">Ajouter une Unité</a>
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
                                            <!--  <a href="{{ route('unites.show', $unite->id) }}" class="btn btn-info btn-sm">Voir</a> -->
                                            <!-- Modifier -->
                                            <a href="{{ route('unites.edit', $unite->id) }}" class="text-blue-500 hover:text-blue-700 me-8">
                                                <i class="fas fa-pen text-2xl"></i>
                                            </a>
                                        <!-- Supprimer -->
                                        <form action="{{ route('unites.destroy', $unite->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette unité ?')"
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

 @endsection 
