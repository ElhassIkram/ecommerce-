@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">
                            Ajouter un État
                        </div>

                        <div class="card-body">

                            <form action="{{ route('etats.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="etat">Nom de l'État :</label>

                                    <input type="text"
                                           class="form-control"
                                           id="etat"
                                           name="etat">

                                    @error('etat')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Ajouter
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