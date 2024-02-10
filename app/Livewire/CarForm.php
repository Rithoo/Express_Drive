<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Car;  // Ajustez le nom du modèle
use Illuminate\Support\Facades\Storage;

class CarForm extends Component
{
    public $marque, $model, $year, $quantity, $price, $status = 0, $picture;

    public function SaveCar()
    {
        // $this->validate([
        //     'marque' => 'required',
        //     'model' => 'required',
        //     'year' => 'required|integer',
        //     'quantity' => 'required|integer',
        //     'price' => 'required|numeric',
        //     'status' => 'required|integer|in:0,1',
        //     'picture' => 'nullable|image|max:2048',  // Ajustez les règles de validation
        // ]);

        // $car = Car::create([
        //     'marque' => $this->marque,
        //     'model' => $this->model,
        //     'year' => $this->year,
        //     'quantity' => $this->quantity,
        //     'price' => $this->price,
        //     'status' => $this->status,
        // ]);

        // if ($this->picture) {
        //     $imagePath = $this->picture->store('public/car-images');
        //     $car->update(['picture' => $imagePath]);
        // }

        // $this->save();

        // session()->flash('message', 'Voiture ajoutée avec succès!');
    }

    
    public function updated($fields)
    {
        $this->validate($fields,[
            'marque' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|integer|in:0,1',
            'picture' => 'nullable|image|max:2048',  // Ajustez les règles de validation
        ]);
    }

    public function render()
    {
        return view('livewire.car-form');
    }
}
