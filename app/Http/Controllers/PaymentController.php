<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\View\View;

class PaymentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $payments = Payment::all();
        return view('payments.index', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'status' => 'required|integer',
            'amount' => 'required|numeric',
            'sale_id' => 'required|exists:sales,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]);

        // Créer un nouveau paiement
        Payment::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('payments.index')->with('success', 'Payment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $payments = Payment::findOrFail($id);
        return view('payments.show', ['payment' => $payments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $payments = Payment::findOrFail($id);
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|integer',
            'amount' => 'required|numeric',
            'sale_id' => 'required|exists:sales,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]);

        $payments = Payment::findOrFail($id);
        $input = $request->all();
        $payments->update($input);
        return redirect()->route('addresses.index')->with('success', 'Address updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Payment::destroy($id);
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully!');
    }
}
