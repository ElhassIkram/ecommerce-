{{-- @extends('layouts.dashboard')


@section('content') --}}
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Modifier une marque</div>

                    <div class="card-body">
                        <form action="{{ route('marques.update', $marque->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="marque">Nom de la marque</label>
                                <input type="text" name="marque" id="marque" class="form-control" value="{{ $marque->marque }}">
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
    </div>
{{-- @endsection --}}
