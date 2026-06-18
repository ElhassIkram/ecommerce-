@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="card">
                <div class="card-header">Liste des Modes de Règlement</div>
               <div class="card-body">

                <a href="{{ route('modereglements.create') }}" class="btn btn-primary mb-3">Ajouter un Mode de Règlement</a>

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
                        <thead >
                            <tr>
                               <th scope="col">#</th>
                                <th>Mode de Règlement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modereglements as $modereglement)
                                <tr>
                                    <th scope="row">{{ $modereglement->id }}</th>
                                    <td>{{ $modereglement->mode_reglements }}</td>
                                    <td>
                                         <!-- <a href="{{ route('modereglements.show', $modereglement->id) }}" class="btn btn-info btn-sm">Voir</a> -->
                                         <!-- Modifier -->
                                         <a href="{{ route('modereglements.edit', $modereglement->id) }}"  class="text-blue-500 hover:text-blue-700 me-8">
                                                <i class="fas fa-pen text-2xl"></i>
                                            </a>
                                            <!-- Supprimer -->
                                    <form action="{{ route('modereglements.destroy', $modereglement->id) }}"
                                        method="POST" style="display: inline;
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce mode de règlement ?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-danger border-0 bg-transparent">
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

@push('scripts')
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endpush
