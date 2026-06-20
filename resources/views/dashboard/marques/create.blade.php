@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">
                            Ajouter une Marque
                        </div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('marques.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="marque">Marque</label>

                                    <input type="text"
                                           class="form-control"
                                           id="marque"
                                           name="marque"  >

                                    @error('marque')
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