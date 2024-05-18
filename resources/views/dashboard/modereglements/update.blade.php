<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mode de Règlement</title>
</head>
<body>
    <h1>Update Mode de Règlement</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('modereglements.update', $modereglement->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="mode_reglement">Mode de Règlement:</label>
            <input type="text" id="mode_reglement" name="mode_reglement" value="{{ old('mode_reglement', $modereglement->{'mode-reglement'}) }}">
            @error('mode_reglement')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
