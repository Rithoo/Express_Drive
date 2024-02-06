<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\View\View;


class CarController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $cars = Car::all();
        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'marque' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $car = Car::create($request->all());

        // Handle image upload if provided
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('car_pictures');
            $car->update(['picture' => $picturePath]);
        }

        return redirect()->route('cars.index')->with('success', 'Car created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $cars = Car::findOrFail($id);
        return view('cars.show', ['cars' => $cars]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $cars = Car::findOrFail($id);
        return view('cars.edit', ['cars' => $cars]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'marque' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cars = Car::findOrFail($id);
        $input = $request->all();
        $cars->update($input);
        return redirect()->route('cars.index')->with('success', 'Car created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Car::destroy($id);
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }
}
