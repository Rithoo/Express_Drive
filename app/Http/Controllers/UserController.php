<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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
        $countUsers = User::count();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

       
        $recentUsers = User::whereDate('created_at', now()->toDateString())->get();
        $recentUsers = count($recentUsers ?? []);

        $users = User::paginate(5);
        // dd($user);
        return view('users.index', [
            'users' => $users,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
            'recentUsers' => $recentUsers,
            'countUsers' => $countUsers,
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
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        try {
            $user = User::findOrFail($id);
            // Utilisez $user normalement
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Rediriger l'utilisateur vers une page d'erreur 404
            return response()->view('errors.404', [], 404);
        }

        return view('users.edit', [

            'users' => $user,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
        ]);
    }

    public function update(UpdateUserRequest $request, $userId)
    {
        
        $validatedData = $request->validated();

        $userToUpdate = User::findOrFail($userId);

        $addressFind = Address::findOrFail($userToUpdate->address->id);

        // dd($userToUpdate, $addressFind, $request->all());
        
        if(!$addressFind){
            return redirect()->back()->with(['error-message'=>"No adddress find"]);
        }

        $addressFind->line1 = $validatedData['line1'] ?? '';
        $addressFind->line2 = $validatedUserData['line2'] ?? ''; // Utilisation de la valeur par défaut au cas où line2 n'est pas défini
        $addressFind->line3 = $validatedUserData['line3'] ?? ''; // Utilisation de la valeur par défaut au cas où line3 n'est pas défini
        $addressFind->street = $validatedData['street'];
        $addressFind->postal_code = $validatedData['postal_code'];
        $addressFind->city_id = $validatedData['city_id'];
        $addressFind->update();
        // Valider les données
        // Créer une instance d'utilisateur
        
        // Attribuer les valeurs aux propriétés
        $userToUpdate->last_name = $request->last_name;
        $userToUpdate->first_name = $request->first_name;
        $userToUpdate->email = $request->email;
        
        // Gérer l'avatar s'il est présent
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars');
            $userToUpdate->avatar = $avatarPath;
        }
        //dd($userToUpdate);

        $userToUpdate->update();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
