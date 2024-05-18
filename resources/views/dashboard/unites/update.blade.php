@extends('layouts.dashboard')
@section('content') 
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier l'Unité</div>

                <div class="card-body">
                    <form action="{{ route('unites.update', $unite->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="unite">Unité :</label>
                            <input type="text" class="form-control" id="unite" name="unite" value="{{ $unite->unite }}">
                        </div>

                        <!-- Ajoutez d'autres champs à modifier ici selon vos besoins -->

                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection 
