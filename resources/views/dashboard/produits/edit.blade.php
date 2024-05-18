<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Produit</title>
</head>
<body>
    <h1>Modifier le Produit</h1>

    <form method="POST" action="{{ route('produits.update', $produit->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="codebarre">Code Barre:</label>
            <input type="text" name="codebarre" id="codebarre" value="{{ $produit->codebarre }}">
        </div>

        <div>
            <label for="designation">Désignation:</label>
            <input type="text" name="designation" id="designation" value="{{ $produit->designation }}">
        </div>

        <div>
            <label for="prix_ht">Prix HT:</label>
            <input type="text" name="prix_ht" id="prix_ht" value="{{ $produit->prix_ht }}">
        </div>

        <div>
            <label for="tva">TVA:</label>
            <input type="text" name="tva" id="tva" value="{{ $produit->tva }}">
        </div>

        <div>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description">{{ $produit->description }}</textarea><br>
        </div>

        <div>
            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image"><br>
        </div>

        <div>
            <label for="sous_famille_id">Sous-Famille:</label><br>
            <select id="sous_famille_id" name="sous_famille_id">
                @foreach($sousfamilles as $sousfamille)
                    <option value="{{ $sousfamille->id }}" {{ $produit->sous_famille_id == $sousfamille->id ? 'selected' : '' }}>{{ $sousfamille->libelle }}</option>
                @endforeach
            </select><br>
        </div>

        <div>
            <label for="marque_id">Marque:</label><br>
            <select id="marque_id" name="marque_id">
                @foreach($marques as $marque)
                    <option value="{{ $marque->id }}" {{ $produit->marque_id == $marque->id ? 'selected' : '' }}>{{ $marque->marque }}</option>
                @endforeach
            </select><br>
        </div>

        <div>
            <label for="unite_id">Unité:</label><br>
            <select id="unite_id" name="unite_id">
                @foreach($unites as $unite)
                    <option value="{{ $unite->id }}" {{ $produit->unite_id == $unite->id ? 'selected' : '' }}>{{ $unite->unite }}</option>
                @endforeach
            </select><br>
        </div>

        <button type="submit">Mettre à jour le Produit</button>
    </form>
</body>
</html>
