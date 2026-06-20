@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">
                            Modifier la Sous-Famille
                        </div>

                        <div class="card-body">

                            <form action="{{ route('sousfamilles.update', $sousfamille->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <!-- Libellé -->
                                <div class="form-group">
                                    <label for="libelle">Libellé :</label>
                                    <input type="text"
                                           class="form-control"
                                           id="libelle"
                                           name="libelle"
                                           value="{{ old('libelle', $sousfamille->libelle) }}">
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label for="image">Image :</label>
                                    <input type="file"
                                           class="form-control"
                                           id="image"
                                           name="image"
                                           accept="image/jpeg,image/png,image/jpg,image/gif">

                                    @if($sousfamille->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $sousfamille->image) }}"
                                                 style="width:80px;height:80px;object-fit:cover;border-radius:5px;">
                                        </div>
                                    @endif
                                </div>

                                <!-- Famille -->
                                <div class="form-group">
                                    <label for="famille_id">Famille :</label>
                                    <select class="form-control"
                                            id="famille_id"
                                            name="famille_id">

                                        @foreach($familles as $famille)
                                            <option value="{{ $famille->id }}"
                                                {{ $sousfamille->famille_id == $famille->id ? 'selected' : '' }}>
                                                {{ $famille->libelle }}
                                            </option>
                                        @endforeach

                                    </select>
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