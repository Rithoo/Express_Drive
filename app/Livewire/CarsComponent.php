<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarsComponent extends Component
{
    public $marque, $model, $year, $quantity, $price, $status = 0, $picture;

    public function updated($fields)
    {
        $this->validate([
            'marque' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'), // Année entre 1900 et l'année actuelle            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|integer|in:0,1',
            'picture' => 'nullable|image|max:2048',  // Ajustez les règles de validation
        ]);
    }

    public function SaveCar()
    {
        $this->validate([
            'marque' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'), // Année entre 1900 et l'année actuelle            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|integer|in:0,1',
            'picture' => 'nullable|image|max:2048',  // Ajustez les règles de validation
        ]);


        $car = Car::create([
            'marque' => $this->marque,
            'model' => $this->model,
            'year' => $this->year,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'status' => $this->status,
        ]);

        if ($this->picture) {
            $imagePath = $this->picture->store('public/car-images');
            $car->update(['picture' => $imagePath]);
        }

        // $this->save();

        session()->flash('message', 'Car added with succefull!');

        // $this->dispathBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.cars-component')->layout('livewire.layouts.cars');
    }
}
