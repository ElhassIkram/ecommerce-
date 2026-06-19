@extends('layouts.dashboard')

@section('content')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Modifier Mode de Règlement
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

                            <form action="{{ route('modereglements.update', $modereglement->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="mode_reglement">Mode de Règlement :</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="mode_reglements"
                                        value="{{ old('mode_reglements', $modereglement->mode_reglements) }}"
                                    >
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