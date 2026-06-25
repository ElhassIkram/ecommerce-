@extends('layouts.dashboard')

@section('content') 
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">Modifier une marque</div>

                        <div class="card-body">
                            <form action="{{ route('marques.update', $marque->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="marque">Nom de la marque</label>
                                    <input type="text" name="marque" id="marque" class="form-control" value="{{ old('marque', $marque->marque) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Image actuelle</label><br>
                                    @if($marque->image)
                                        <img src="{{ asset('storage/' . $marque->image) }}" alt="Image" style="width: 100px; margin-bottom: 10px;">
                                    @else
                                        <p>Aucune image</p>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="image">Changer l'image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Modifier la marque</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection