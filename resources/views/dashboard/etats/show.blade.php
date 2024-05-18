@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content container">
    <div class="card">
        <div class="card-header">Détails de l'État</div>
        <div class="card-body">
            <h5 class="card-title">État : {{ $etat->etat }}</h5>
            <a href="{{ route('etats.index') }}" class="btn btn-primary">Retour à la liste des États</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
