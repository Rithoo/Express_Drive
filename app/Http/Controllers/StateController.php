<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        return view('states.index', ['states' => $states]);
    }

    public function create()
    {
        // Ajoutez du code pour la création d'un nouvel état (state) si nécessaire
        return view('states.create');
    }

    public function store(Request $request)
    {

        
        // Ajoutez du code pour sauvegarder le nouvel état (state) créé
        State::create($request->all());

        return redirect()->route('states.index')->with('success', 'State created successfully');
    }

    public function show($id)
    {
        $state = State::findOrFail($id);
        return view('states.show', ['states' => $state]);
    }

    public function edit($id)
    {
        // Ajoutez du code pour l'édition d'un état (state) existant
        $state = State::findOrFail($id);
        return view('states.edit', ['states' => $state]);
    }

    public function update(Request $request, $id)
    {
        // Ajoutez du code pour mettre à jour l'état (state) existant
        $state = State::findOrFail($id);
        $state->update($request->all());

        return redirect()->route('states.index')->with('success', 'State updated successfully');
    }

    public function destroy($id)
    {
        // Ajoutez du code pour supprimer l'état (state) existant
        $state = State::findOrFail($id);
        $state->destroy($id);

        return redirect()->route('states.index')->with('success', 'State deleted successfully');
    }
}
