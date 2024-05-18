@extends('layouts.dashboard')


@section('content') 
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Détails de l'Unité</div>

                <div class="card-body">
                    <p><strong>ID :</strong> {{ $unite->id }}</p>
                    <p><strong>Unité :</strong> {{ $unite->unite }}</p>
                    <!-- Ajoutez d'autres détails de l'unité ici selon vos besoins -->
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>
{{-- @endsection --}}
