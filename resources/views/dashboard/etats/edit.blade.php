@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">
                            Modifier l'État
                        </div>

                        <div class="card-body">

                            <form action="{{ route('etats.update', $etat->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="etat">État :</label>

                                    <input type="text"
                                           class="form-control"
                                           id="etat"
                                           name="etat"
                                           value="{{ $etat->etat }}">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Enregistrer les modifications
                                </button>

                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection