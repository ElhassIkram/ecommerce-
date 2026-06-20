<!-- resources/views/familles/create.blade.php -->

@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">
                            Ajouter une Famille
                        </div>

                        <div class="card-body">

                            <form action="{{ route('familles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="libelle">Libellé :</label>
                                    <input type="text"
                                           class="form-control"
                                           id="libelle"
                                           name="libelle"
                                           value="{{ old('libelle') }}">

                                    @error('libelle')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Image :</label>
                                    <input type="file"
                                           class="form-control"
                                           id="image"
                                           name="image"
                                           accept="image/jpeg,image/png,image/jpg,image/gif">

                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
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