<?php

namespace App\Http\Controllers;

use App\Models\etats;
use Illuminate\Http\Request;

class EtatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etats = etats::all();
        return view('dashboard.etats.index', compact('etats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.etats.create');
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
            'etat' => 'required|string',
        ]);

        etats::create($request->all());

        return redirect()->route('etats.index')->with('success', 'État ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etat  $etat
     * @return \Illuminate\Http\Response
     */
    public function show(etats $etat)
    {
        return view('dashboard.etats.show', compact('etat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etat  $etat
     * @return \Illuminate\Http\Response
     */
    public function edit(etats $etat)
    {
        return view('dashboard.etats.edit', compact('etat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etat  $etat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, etats $etat)
    {
        $request->validate([
            'etat' => 'required|string',
        ]);

        $etat->update($request->all());

        return redirect()->route('etats.index')
            ->with('success', 'État mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etat  $etat
     * @return \Illuminate\Http\Response
     */
    public function destroy(etats $etat)
    {
        $etat->delete();

        return redirect()->route('etats.index')
            ->with('success', 'État supprimé avec succès.');
    }
}
