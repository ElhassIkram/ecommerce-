@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="card">
                <div class="card-header">
                    <h3>Liste des Utilisateurs</h3>
                </div>

                <div class="card-body">

                    <!-- Success / Error -->
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

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Email</th>
                                    <th>Tél</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->nom }}</td>
                                        <td>{{ $user->prenom }}</td>
                                        <td>{{ $user->adresse }}</td>
                                        <td>{{ $user->ville }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->tell }}</td>

                                        <td>
                                            <!-- Show -->
                                            <a href="{{ route('users.show', $user->id) }}"
                                               class="text-blue-500 me-2">
                                                <i class="fas fa-eye text-lg"></i>
                                            </a>

                                            <!-- Edit -->
                                            <a href="{{ route('users.edit', $user->id) }}"
                                               class="text-warning me-2">
                                                <i class="fas fa-pen text-lg"></i>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                  method="POST"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        onclick="return confirm('Supprimer cet utilisateur ?')"
                                                        class="text-danger border-0 bg-transparent">
                                                    <i class="fas fa-trash text-lg"></i>
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



