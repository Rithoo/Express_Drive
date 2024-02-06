<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $sales = Sale::all();
        return view('sales.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Créez la vente
        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'La vente a été créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $sales = Sale::findOrFail($id);
        return view('sales.show', ['sales' => $sales]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $sales = Sale::findOrFail($id);
        return view('sales.edit', ['sale' => $sales]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'date' => 'required|date',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
        ]);


        $sales = Sale::findOrFail($id);
        $input = $request->all();
        $sales->update($input);
        return redirect()->route('sales.index')->with('success', 'La vente a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Sale::destroy($id);
        return redirect()->route('sales.index')->with('success', 'La vente a été supprimée avec succès.');
    }
}
