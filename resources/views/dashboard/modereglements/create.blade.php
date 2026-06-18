<!-- resources/views/modereglements/create.blade.php -->

@extends('layouts.dashboard')

@section('content')

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">
                            Ajouter un Mode de Règlement
                        </div>

                        <div class="card-body">

                            <form action="{{ route('modereglements.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="mode-reglement">Mode de Règlement</label>

                                    <input type="text"
                                           class="form-control @error('mode-reglement') is-invalid @enderror"
                                           id="mode-reglement"
                                           name="mode-reglement"
                                           value="{{ old('mode-reglement') }}">

                                    @error('mode-reglement')
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