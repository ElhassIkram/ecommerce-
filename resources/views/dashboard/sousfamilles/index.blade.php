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
                <th></th>
                    <th>Libellé</th>
                    <th>Famille</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sousfamilles as $sousfamille)
                    <tr>
                    <td>
                            @if($sousfamille->image)
                                <img src="{{ asset('storage/' . $sousfamille->image) }}" alt="{{ $sousfamille->libelle }}" style="max-width: 100px;">
                            @else
                                <p>Pas d'image</p>
                            @endif
                        </td>
                        <td>{{ $sousfamille->libelle }}</td>
                        
                        <td>

                            @if ($sousfamille->famille)
                                {{ $sousfamille->famille->libelle }}
                            @else
                                <span class="text-muted">Aucune famille associée</span>
                            @endif
                        </td>


                        <td>
                            <div class="flex space-x-4">
                            <a href="{{ route('sousfamilles.edit', $sousfamille->id) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-pen text-2xl"></i>
                            </a>
                            <form action="{{ route('sousfamilles.destroy', $sousfamille->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                        @method('DELETE')
                                <button type="submit"  onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sous-famille ?')"><i class="fas fa-trash text-red-500 text-2xl"></i></button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>
</div>
@endsection
<style>
    td img {
    width: 70px;
    height: 70px;
    object-fit: cover; /* Assure que l'image remplit l'espace sans être déformée */
    border-radius: 3px; /* Optionnel : ajoute des bords arrondis pour un meilleur rendu */
    margin-top: 10px;
}

</style>  