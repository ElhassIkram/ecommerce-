<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\details_commandes;
use App\Models\produits;
use Illuminate\Http\Request;

class DetailsCommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailcommandes = details_commandes::all();
        return view('dashboard.detailcommandes.index',compact('detailcommandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = produits::all(); 
        $commandes = commandes::all();
        // Remplacez Produit par le nom de votre modèle de produit
        return view('dashboard.detailcommandes.create', compact('produits','commandes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            // Spécifier les règles de validation
        ]);

        // Créer un nouveau détail de commande dans la base de données
        details_commandes::create($request->all());

        // Rediriger vers la page index avec un message de succès
        return redirect()->route('detailcommandes.index')
            ->with('success', 'Détail de commande créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detailcommande = details_commandes::findOrFail($id);
        return view('dashboard.detailcommandes.show', compact('detailcommande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detailcommande = details_commandes::findOrFail($id);
    $produits = produits::all();
    $commandes = commandes::all();
     // Assurez-vous de remplacer Produit par le nom de votre modèle de produit
    return view('dashboard.detailcommandes.edit', compact('detailcommande', 'produits','commandes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // Spécifier les règles de validation
        ]);

        // Récupérer le détail de commande à mettre à jour
        $detailcommande = details_commandes::findOrFail($id);

        // Mettre à jour le détail de commande dans la base de données
        $detailcommande->update($request->all());

        // Rediriger vers la page index avec un message de succès
        return redirect()->route('detailcommandes.index')
            ->with('success', 'Détail de commande mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detailcommande = details_commandes::findOrFail($id);
        $detailcommande->delete();

        // Rediriger vers la page index avec un message de succès
        return redirect()->route('detailcommandes.index')
            ->with('success', 'Détail de commande supprimé avec succès.');
    }
}
