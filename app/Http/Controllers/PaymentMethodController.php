<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\View\View;

class PaymentMethodController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $paymentMethods = PaymentMethod::all();
        return view('payment_methods.index', ['paymentMethods' => $paymentMethods]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('payment_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type_card' => 'required|string',
            'expiration_date' => 'required|date',
            'cvv_card' => 'required|integer',
        ]);

        // Création d'une nouvelle méthode de paiement
        PaymentMethod::create($request->all());

        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $paymentMethods = PaymentMethod::findOrFail($id);
        return view('payment_methods.show', ['paymentMethods' => $paymentMethods]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $paymentMethods = PaymentMethod::findOrFail($id);
        return view('payment_methods.edit', ['paymentMethod' => $paymentMethods]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'type_card' => 'required|string',
            'expiration_date' => 'required|date',
            'cvv_card' => 'required|integer',
        ]);

        $paymentMethods = PaymentMethod::findOrFail($id);
        $input = $request->all();
        $paymentMethods->update($input);
        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PaymentMethod::destroy($id);
        return redirect()->route('payment_methods.index')
            ->with('success', 'Méthode de paiement supprimée avec succès.');
    }
}
