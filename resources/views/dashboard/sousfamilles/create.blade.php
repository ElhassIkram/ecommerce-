<!-- resources/views/sousfamilles/create.blade.php -->

@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">
                            Ajouter une Sous-Famille
                        </div>

                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('sousfamilles.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <!-- Libellé -->
                                <div class="form-group">
                                    <label for="libelle">Libellé :</label>
                                    <input type="text"
                                           class="form-control"
                                           id="libelle"
                                           name="libelle"
                                           value="{{ old('libelle') }}">

                                   
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label for="image">Image :</label>
                                    <input type="file"
                                           class="form-control"
                                           id="image"
                                           name="image"
                                           accept="image/jpeg,image/png,image/jpg,image/gif">

                                   
                                </div>

                                <!-- Famille -->
                                <div class="form-group">
                                    <label for="famille_id">Famille :</label>
                                    <select class="form-control"
                                            id="famille_id"
                                            name="famille_id">

                                        <option value="">Sélectionner une famille</option>

                                        @foreach($familles as $famille)
                                            <option value="{{ $famille->id }}">
                                                {{ $famille->libelle }}
                                            </option>
                                        @endforeach

                                    </select>

                                   
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