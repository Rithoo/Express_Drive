<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
           $addresses = Address::all();
           return view('addresses.index', ['addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'line1' => 'required', 'string', 'max:255', 'default' => '',
            'line2' => 'nullable', 'string', 'max:255', 'default' => '',
            'line3' => 'nullable', 'string', 'max:255', 'default' => '',
            'street' => 'required', 'string', 'max:255', 'default' => '',
            'postal_code' => 'required', 'string', 'max:255', 'regex:/^[0-9]{5}$/',
            'city_id' => 'required|exists:cities,id',
        ]);

        Address::create($validatedData);

        return redirect()->route('addresses.index')->with('success', 'Address created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $address = Address::findOrFail($id);
        return view('addresses.show', ['address' =>$address]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $address = Address::findOrFail($id);
        return view('addresses.edit', ['address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validation des données du formulaire
        $request->validate([
            'line1' => 'required|string',
            'line2' => 'nullable|string',
            'line3' => 'nullable|string',
            'street' => 'required|string',
            'postal_code' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ]);

        $address = Address::findOrFail($id);
        $input = $request->all();
        $address->update($input);
        return redirect()->route('addresses.index')->with('success', 'Address updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Address::destroy($id);
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully!');
    }
}




