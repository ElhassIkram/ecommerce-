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
        'mode_reglements' => 'required|string',
    ]);

    mode_reglements::create([
        'mode_reglements' => $request->mode_reglements,
    ]);

    return redirect()->route('modereglements.index')
        ->with('success', 'Mode de règlement ajouté avec succès.');
}

   
    public function show(mode_reglements $modereglement)
    {
        return view('dashboard.modereglements.show', compact('modereglement'));
    }

public function edit($id)
{
    $modereglement = mode_reglements::findOrFail($id);
    return view('dashboard.modereglements.edit', compact('modereglement'));
}
 


public function update(Request $request, $id)
{
    $request->validate([
        'mode_reglements' => 'required|string',
    ]);

    $modereglement = mode_reglements::findOrFail($id);

    $modereglement->update([
        'mode_reglements' => $request->mode_reglements,
    ]);

    return redirect()->route('modereglements.index')
        ->with('success', 'Mode de règlement modifié avec succès.');
}


  
  public function destroy(mode_reglements $modereglement)
{
    try {
        $modereglement->delete();

        return redirect()->route('modereglements.index')
            ->with('success', 'Mode de règlement supprimé avec succès.');

    } catch (\Exception $e) {

        return redirect()->route('modereglements.index')
            ->with('error', 'Erreur lors de la suppression du mode de règlement.');
    }
}
}
