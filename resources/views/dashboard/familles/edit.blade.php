@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">
                            Modifier la Famille
                        </div>

                        <div class="card-body">

                            <form action="{{ route('familles.update', $famille->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="libelle">Libellé :</label>
                                    <input type="text"
                                           class="form-control"
                                           id="libelle"
                                           name="libelle"
                                           value="{{ old('libelle', $famille->libelle) }}">
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

                                @if($famille->image)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $famille->image) }}"
                                             alt="{{ $famille->libelle }}"
                                             width="150"
                                             class="img-thumbnail">
                                    </div>
                                @endif

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