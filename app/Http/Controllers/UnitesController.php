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
        $unites = Unites::all();
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unites  $unites
     * @return \Illuminate\Http\Response
     */
    // Dans votre contrôleur
public function show($id)
{
    $unite = Unites::findOrFail($id); // Supposons que votre modèle s'appelle Unite
    return view('dashboard.unites.show', compact('unite'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unites  $unites
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unite = Unites::findOrFail($id);
        return view('dashboard.unites.edit', compact('unite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unites  $unites
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unites  $unites
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unites $unite)
{
    $unite->delete();

    return redirect()->route('unites.index')
        ->with('success', 'Unité supprimée avec succès.');
}
}
