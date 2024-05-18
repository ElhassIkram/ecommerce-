<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\etats;
use App\Models\mode_reglements;
use App\Models\User;
use Illuminate\Http\Request;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = commandes::all();
        return view('dashboard.commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $etats = etats::all();
        
        $modesReglement = mode_reglements::all();
        return view('dashboard.commandes.create', compact('users','etats','modesReglement'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            // Define your validation rules here
        ]);

        commandes::create($request->all());

        return redirect()->route('commandes.index')
            ->with('success', 'Commande created successfully.');
    }

    
    public function show(commandes $commande)
    {
        return view('dashboard.commandes.show', compact('commande'));
    }

    public function edit(commandes $commande)
    {
        return view('dashboard.commandes.edit', compact('commande'));
    }

   
    public function update(Request $request, commandes $commande)
    {
        $request->validate([
            // Define your validation rules here
        ]);

        $commande->update($request->all());

        return redirect()->route('commandes.index')
            ->with('success', 'Commande updated successfully.');
    }

   
    public function destroy(commandes $commande)
    {
        $commande->delete();

        return redirect()->route('commandes.index')
            ->with('success', 'Commande deleted successfully.');
    }
}
