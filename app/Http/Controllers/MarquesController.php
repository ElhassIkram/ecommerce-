<?php

namespace App\Http\Controllers;

use App\Models\marques;
use Illuminate\Http\Request;

class MarquesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marques = marques::all();
        return view('dashboard.marques.index', compact('marques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.marques.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required|string',
        ]);

        marques::create($request->all());

        return redirect()->route('marques.index')
            ->with('success', 'Marque ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(marques $marque)
    {
        return view('dashboard.marques.show', compact('marque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit(marques $marque)
    {
        return view('dashboard.marques.edit', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marques $marque)
    {
        $request->validate([
            'marque' => 'required|string',
        ]);

        $marque->update($request->all());

        return redirect()->route('marques.index')
            ->with('success', 'Marque mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(marques $marque)
    {
        $marque->delete();

        return redirect()->route('marques.index')
            ->with('success', 'Marque supprimée avec succès.');
    }
}
