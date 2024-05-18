 @extends('layouts.dashboard')


@section('content') 
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Détails de la marque</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="marque">Nom de la marque:</label>
                            <p>{{ $marque->marque }}</p>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Créé le:</label>
                            <p>{{ $marque->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Dernière modification:</label>
                            <p>{{ $marque->updated_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <a href="{{ route('marques.index') }}" class="btn btn-primary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
 @endsection 
