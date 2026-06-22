@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="card">

                <div class="card-header">
                    Liste des Familles
                </div>

                <div class="card-body">

                    <a href="{{ route('familles.create') }}" class="btn btn-primary mb-3">
                        Ajouter une famille
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

                    <table class="table" id="table-1">

                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Libellé</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($familles as $famille)
                                <tr>

                                    <td>
                                        @if($famille->image)
                                            <img src="{{ asset('storage/' . $famille->image) }}"
                                                 alt="{{ $famille->libelle }}"
                                                 style="width:70px;height:70px;object-fit:cover;border-radius:5px;margin-bottom:10px;">
                                        @else
                                            Pas d'image
                                        @endif
                                    </td>

                                    <td>{{ $famille->libelle }}</td>

                                    <td>
                                        <a href="{{ route('familles.edit', $famille->id) }}"
                                          class="text-blue-500 hover:text-blue-700 me-8">
                                            <i class="fas fa-pen text-2xl"></i>
                                        </a>

                                        <form action="{{ route('familles.destroy', $famille->id) }}"
                                              method="POST"
                                              style="display:inline;"   >

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette famille ?')"
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