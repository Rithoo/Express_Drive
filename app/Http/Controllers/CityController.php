<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $cities = City::all();
        return view('cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Creation d'un nouveau ville
        City::create([
            'name' => $request->input('name')
        ]);

        // Redirection avec un message de succès
        return redirect()->route('cities.index')->with('success', 'City created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $city = City::findOrFail($id);
        return view('cities.show', ['cities' => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $city = City::findOrFail($id);
        return view('cities.edit', ['cities' => $city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $city = City::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Mise a jour de la ville
        $city->update([
            'name' => $request->input('name')
        ]);

        $input = $request->all();
        $city->update($input);

        // Redirection avec un message de succès
        return redirect()->route('cities.index')->with('success', 'City updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        City::destroy($id);
        return redirect()->route('cities.index')->with('success', 'City deleted successfully');
    }
}
