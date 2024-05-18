<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mode de Règlement</title>
</head>
<body>
    <h1>Edit Mode de Règlement</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('modereglements.update', $modereglement->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="mode_reglement">Mode de Règlement:</label>
            <input type="text" id="mode_reglement" name="mode_reglement" value="{{ old('mode_reglement', $modereglement->{'mode-reglement'}) }}">
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>
