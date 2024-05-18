<?php

namespace App\Http\Controllers;

use App\Models\marques;
use App\Models\produits;
use App\Models\sous_familles;
use App\Models\unites;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = produits::all();
        return view('dashboard.produits.index', compact('produits'));
    }

    public function create()
{
    $sousfamilles = sous_familles::all();
    $marques = marques::all();
    $unites = unites::all();
    
    return view('dashboard.produits.create', compact('sousfamilles', 'marques', 'unites'));
}
    public function store(Request $request)
    {
        $request->validate([
            'codebarre' => 'required|numeric',
            'designation' => 'required|string',
            'prix_ht' => 'required|numeric',
            'tva' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // image validation
            'sous_famille_id' => 'required|exists:sous_familles,id',
            'marque_id' => 'required|exists:marques,id',
            'unite_id' => 'required|exists:unites,id',
        ]);

        $validatedData = $request->only('codebarre', 'designation', 'prix_ht', 'tva', 'sous_famille_id','description' ,'marque_id', 'unite_id');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        produits::create($validatedData);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function show($id)
    {
        $produit=produits::find('$id');
        return view('dashboard.produits.show', compact('produit'));
    }

    public function edit(produits $produit)
    {
        $sousfamilles = sous_familles::all();
        $marques = marques::all();
        $unites = Unites::all();
        return view('dashboard.produits.edit', compact('produit', 'sousfamilles','marques','unites'));
    }

    public function update(Request $request, produits $produit)
    {
        $request->validate([
            'codebarre' => 'required|numeric',
            'designation' => 'required|string',
            'prix_ht' => 'required|numeric',
            'tva' => 'required|numeric',
            'sous_famille_id' => 'required|exists:sousfamilles,id',
            'marque_id' => 'required|exists:marques,id',
            'unite_id' => 'required|exists:unites,id',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(produits $produit)
    {
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
