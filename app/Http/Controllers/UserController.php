<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();


        $recentUsers = User::whereDate('created_at', now()->toDateString())->get();
        $recentUsers = count($recentUsers ?? []);


        return view('users.index', [
            'users' => $users,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
            'recentUsers' => $recentUsers,
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        // dd($request);
        $validatedData = $request->validated();

        $newAddress = new Address();
        $newAddress->line1 = $validatedData['line1'];
        $newAddress->line2 = $validatedUserData['line2'] ?? ''; // Utilisation de la valeur par défaut au cas où line2 n'est pas défini
        $newAddress->line3 = $validatedUserData['line3'] ?? ''; // Utilisation de la valeur par défaut au cas où line3 n'est pas défini
        $newAddress->street = $validatedData['street'];
        $newAddress->postal_code = $validatedData['postal_code'];
        $newAddress->city_id = $validatedData['city_id'];
        $newAddress->save();
        // Valider les données
        // Créer une instance d'utilisateur
        $user = new User();

        // Attribuer les valeurs aux propriétés
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address_id = $newAddress->id;

        // Gérer l'avatar s'il est présent
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars');
            $user->avatar = $avatarPath;
        }
        //dd($user);
        // Sauvegarder l'utilisateur
        $user->save();

         return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', ['users' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', ['users' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validated();
        $newAddress = new Address();
        $newAddress->line1 = $validatedData['line1'];
        $newAddress->line2 = $validatedUserData['line2'] ?? ''; // Utilisation de la valeur par défaut au cas où line2 n'est pas défini
        $newAddress->line3 = $validatedUserData['line3'] ?? ''; // Utilisation de la valeur par défaut au cas où line3 n'est pas défini
        $newAddress->street = $validatedData['street'];
        $newAddress->postal_code = $validatedData['postal_code'];
        $newAddress->city_id = $validatedData['city_id'];
        $newAddress->save();
        // Valider les données
        // Créer une instance d'utilisateur
        $user = new User();

        // Attribuer les valeurs aux propriétés
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address_id = $newAddress->id;

        // Gérer l'avatar s'il est présent
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars');
            $user->avatar = $avatarPath;
        }
        //dd($user);
        // Sauvegarder l'utilisateur
        $user->save();

        $input = $request->all();
        $user->update($input);
        
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->destroy($id);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
