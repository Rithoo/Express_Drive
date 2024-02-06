<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CountryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $countries = Country::all();
        return view('countries.index', ['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Création d'un nouveau pays
        Country::create([
            'name' => $request->input('name'),
        ]);

        // Redirection avec un message de succès
        return redirect()->route('countries.index')->with('success', 'Country created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $country = Country::findOrFail($id);
        return view('countries.show', ['countries' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $country = Country::findOrFail($id);
        return view('countries.edit', ['countries' => $country]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $country = Country::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Mise a jour de la ville
        $country->update([
            'name' => $request->input('name')
        ]);

        $input = $request->all();
        $country->update($input);

        // Redirection avec un message de succès
        return redirect()->route('countries.index')->with('success', 'Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Country::destroy($id);
        return redirect()->route('countries.index')->with('success', 'Country deleted successfully');
    }
}
