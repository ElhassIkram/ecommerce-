<!-- resources/views/unites/create.blade.php -->
  @extends('layouts.dashboard')


@section('content') 
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter une Unité</div>

                    <div class="card-body">
                        <form action="{{ route('unites.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="unite">Nom de l'Unité:</label>
                                <input type="text" class="form-control" id="unite" name="unite">
                                @error('unite')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
 @endsection 
