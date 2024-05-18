<?php

namespace App\Http\Controllers;

use App\Models\familles;
use App\Models\sous_familles;
use Illuminate\Http\Request;

class SousFamillesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sousfamilles = sous_familles::all();
        return view('dashboard.sousfamilles.index', compact('sousfamilles'));
    }

    public function create()
    {
        $familles = familles::all();
        return view('dashboard.sousfamilles.create', compact('familles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'famille_id' => 'required|exists:familles,id',
        ]);
    
        $validatedData = $request->only('libelle', 'famille_id');
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        sous_familles::create($validatedData);
    
        return redirect()->route('sousfamilles.index')->with('success', 'Sous-famille ajoutée avec succès.');
    }

    public function edit($id)
    {
        $sousfamille = sous_familles::findOrFail($id);
        $familles = familles::all();
        return view('dashboard.sousfamilles.edit', compact('sousfamille', 'familles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'famille_id' => 'required|exists:familles,id',
        ]);

        $sousfamille = sous_familles::findOrFail($id);
        $validatedData = $request->only('libelle', 'famille_id');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $sousfamille->update($validatedData);

        return redirect()->route('sousfamilles.index')->with('success', 'Sous-famille mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $sousfamille = sous_familles::findOrFail($id);
        $sousfamille->delete();
        return redirect()->route('sousfamilles.index')->with('success', 'Sous-famille supprimée avec succès.');
    }
}
