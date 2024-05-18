<?php

namespace App\Http\Controllers;

use App\Models\familles;
use Illuminate\Http\Request;

class FamillesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familles = familles::all();

        return view('dashboard.familles.index', compact('familles'));
    }

    public function create()
    {
        return view('dashboard.familles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        $validatedData = $request->only('libelle');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        familles::create($validatedData);

        return redirect()->route('familles.index')->with('success', 'Famille ajoutée avec succès.');
    }

    public function show(familles $famille)
    {
        return view('dashboard.familles.show', compact('famille'));
    }

    public function edit(familles $famille)
    {
        return view('dashboard.familles.edit', compact('famille'));
    }

    public function update(Request $request, familles $famille)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        $validatedData = $request->only('libelle');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $famille->update($validatedData);

        return redirect()->route('familles.index')->with('success', 'Famille mise à jour avec succès.');
    }

    public function destroy(familles $famille)
    {
        $famille->delete();

        return redirect()->route('familles.index')->with('success', 'Famille supprimée avec succès.');
    }
}
