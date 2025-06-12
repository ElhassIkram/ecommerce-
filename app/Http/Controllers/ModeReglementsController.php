<?php

namespace App\Http\Controllers;

use App\Models\mode_reglements;
use Illuminate\Http\Request;

class ModeReglementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modereglements = mode_reglements::orderBy('id', 'desc')->get();
        return view('dashboard.modereglements.index', compact('modereglements'));
    }

    
    public function create()
    {
        return view('dashboard.modereglements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mode-reglement' => 'required|string',
        ]);
      
    // Ajout explicite de la valeur 'mode-reglement' à 'mode_reglements'
    $validatedData = $request->only('mode-reglement');

        mode_reglements::create([
            'mode_reglements' => $validatedData['mode-reglement'],  // Utiliser la valeur validée
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('modereglements.index')
            ->with('success', 'Mode de règlement ajouté avec succès.');
    }

   
    public function show(mode_reglements $modereglement)
    {
        return view('dashboard.modereglements.show', compact('modereglement'));
    }

   
public function edit(mode_reglements $modereglement)
{
    return view('dashboard.modereglements.edit', compact('modereglement'));
}


public function update(Request $request, mode_reglements $modereglement)
{
    $request->validate([
        'mode-reglement' => 'required|string',
    ]);

    $modereglement->update([
        'mode-reglement' => $request->input('mode-reglement'),
    ]);

    return redirect()->route('modereglements.index')
        ->with('success', 'Mode de règlement mis à jour avec succès.');
}



  
    public function destroy(mode_reglements $modereglement)
    {
        $modereglement->delete();

        return redirect()->route('modereglements.index')
            ->with('success', 'Mode de règlement supprimé avec succès.');
    }
}
