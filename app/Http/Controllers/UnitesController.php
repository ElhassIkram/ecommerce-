<?php

namespace App\Http\Controllers;

use App\Models\unites;
use Illuminate\Http\Request;

class UnitesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unites = Unites::orderBy('id', 'desc')->get();
        return view('dashboard.unites.index', compact('unites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.unites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unite' => 'required|string',
        ]);

        Unites::create($request->all());

        return redirect()->route('unites.index')
            ->with('success', 'Unité ajoutée avec succès.');
    }

      public function edit($id)
    {
        $unite = Unites::findOrFail($id);
        return view('dashboard.unites.edit', compact('unite'));
    }

   
public function show($id)
{
    $unite = Unites::findOrFail($id); // Supposons que votre modèle s'appelle Unite
    return view('dashboard.unites.show', compact('unite'));
}


   
    public function update(Request $request, $id)
{
    // Valider les données reçues du formulaire
    $request->validate([
        'unite' => 'required|string|max:255', // Assurez-vous d'adapter les règles de validation selon vos besoins
        // Ajoutez d'autres règles de validation pour d'autres champs à mettre à jour si nécessaire
    ]);

    // Trouver l'unité à mettre à jour
    $unite = Unites::findOrFail($id);

    // Mettre à jour les données de l'unité avec les données reçues du formulaire
    $unite->update([
        'unite' => $request->input('unite'),
        // Mettez à jour d'autres champs ici si nécessaire
    ]);

    // Rediriger l'utilisateur avec un message de succès
    return redirect()->route('unites.index')->with('success', 'L\'unité a été mise à jour avec succès.');
}

    
   public function destroy(Unites $unite)
{
    try {
        $unite->delete();

        return redirect()->route('unites.index')
                         ->with('success', 'Unité supprimée avec succès.');
                         
    } catch (\Exception $e) {
        // Redirect back with an error message if the deletion fails
        // (e.g., if the unit is being used by another record)
        return redirect()->route('unites.index')
                         ->with('error', 'Erreur lors de la suppression de l\'unité.');
    }
}
}
