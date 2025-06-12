@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="container mt-4">
                <h2 class="mb-4">Liste des Modes de Règlement</h2>

                <a href="{{ route('modereglements.create') }}" class="btn btn-success mb-3">Ajouter un Mode de Règlement</a>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($modereglements->isEmpty())
                    <div class="alert alert-info">Aucun mode de règlement disponible pour le moment.</div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                               
                                <th>Mode de Règlement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modereglements as $modereglement)
                                <tr>
                                    
                                    <td>{{ $modereglement->mode_reglements }}</td>
                                    <td>
                                        <a href="{{ route('modereglements.show', $modereglement->id) }}" class="btn btn-info btn-sm">Voir</a>
                                        <a href="{{ route('modereglements.edit', $modereglement->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                        <form action="{{ route('modereglements.destroy', $modereglement->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce mode de règlement ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endpush
