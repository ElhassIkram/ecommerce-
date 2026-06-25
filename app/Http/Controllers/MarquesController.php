<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\marques;
use Illuminate\Http\Request;

class MarquesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marques = marques::orderBy('id', 'desc')->get();
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
        'marque' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // التقييد بحجم 2 ميجا
    ]);

    $data = $request->only('marque');

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('marques', 'public');
        $data['image'] = $path;
    }

    marques::create($data);

    return redirect()->route('marques.index')
        ->with('success', 'Marque ajoutée avec succès.');
}


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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only('marque');

    if ($request->hasFile('image')) {
        
      if ($marque->image) {
        Storage::disk('public')->delete($marque->image);
    }
        $path = $request->file('image')->store('marques', 'public');
        $data['image'] = $path;
    }

    $marque->update($data);

    return redirect()->route('marques.index')
        ->with('success', 'Marque mise à jour avec succès.');
}
   


 public function destroy(marques $marque)
{
    try {
        $marque->delete();

        return redirect()->route('marques.index')
            ->with('success', 'Marque supprimée avec succès.');

    } catch (\Exception $e) {

        return redirect()->route('marques.index')
            ->with('error', 'Erreur lors de la suppression de la marque.');
    }
}
}
