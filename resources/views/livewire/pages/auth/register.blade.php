<?php

use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Address;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $last_name = '';
    public string $first_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public string $country_id = '';
    public string $state_id = '';
    public string $city_id = '';
    public string $line1 = '';
    public string $line2 = '';
    public string $street = '';
    public string $postal_code = '';

    public $countries = '';
    public $states = '';
    public $cities = '';

    public function mount()
    {
        $this->countries = Country::all();
        $this->states = State::all();
        $this->cities = City::all();
    }
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        try {
            $validated = $this->validate([
                'last_name' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'string', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],

                'country_id' => ['required', 'integer', 'max:255', 'exists:countries,id'],
                'state_id' => ['required', 'integer', 'max:255', 'exists:states,id'],
                'city_id' => ['required', 'integer', 'max:255', 'exists:cities,id'],

                'line1' => ['required', 'string', 'max:255', 'default' => ''],
                'line2' => ['nullable', 'string', 'max:255', 'default' => ''],
                'street' => ['required', 'string', 'max:255', 'default' => ''],
                'postal_code' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z0-9]{5,}$/'],
            ]);

            $validated['password'] = Hash::make($validated['password']);

            $newAddress = new Address();
            $newAddress->line1 = $validated['line1'];
            $newAddress->line2 = '';
            $newAddress->line3 = '';
            $newAddress->street = $validated['street'];
            $newAddress->postal_code = $validated['postal_code'];
            $newAddress->city_id = $validated['city_id'];
            $newAddress->save();

            event(
                new Registered(
                    ($user = User::create([
                        'last_name' => $validated['last_name'],
                        'first_name' => $validated['first_name'],
                        'email' => $validated['email'],
                        'password' => $validated['password'],
                        'address_id' => $newAddress->id,
                    ])),
                ),
            );

            Auth::login($user);
            

            // if (auth()->user()->is_admin == 1 ) {
                
            //     $this->redirect(RouteServiceProvider::DASHBOARD_HOME, navigate: true); 

            // }
            
            $this->redirect(RouteServiceProvider::HOME, navigate: true);
            
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::error($th);
        }
    }
};
?>

<div>

    <form wire:submit="register">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input wire:model="last_name" id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>
        <!-- first -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text"
                name="first_name" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- line1 -->
        <div>
            <x-input-label for="line1" :value="__('Line 1')" />
            <x-text-input wire:model="line1" id="line1" class="block mt-1 w-full" type="text" name="line1"
                required autofocus autocomplete="line1" />
            <x-input-error :messages="$errors->get('line1')" class="mt-2" />
        </div>

        <!-- street -->
        <div>
            <x-input-label for="street" :value="__('Street')" />
            <x-text-input wire:model="street" id="street" class="block mt-1 w-full" type="text" name="street"
                required autofocus autocomplete="street" />
            <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="country-register" :value="__('Country')" />
            <select name="country_id" id="country-register" wire:model="country_id"
                class="block mt-1 w-full font-medium text-sm text-gray-700">
                <option value="">{{ __('Select country') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
        </div>

        <!-- State -->
        <div class="mt-4">
            <x-input-label for="state-register" :value="__('State')" />
            <select name="state_id" id="state-register" wire:model="state_id"
                class="block mt-1 w-full font-medium text-sm text-gray-700">
                <option value="">{{ __('Select state') }}</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('state_id')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city-register" :value="__('City')" />
            <select name="city_id" id="city-register" wire:model="city_id"
                class="block mt-1 w-full font-medium text-sm text-gray-700">
                <option value="">{{ __('Select city') }}</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
        </div>



        <!-- postal_code -->
        <div>
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input wire:model="postal_code" id="postal_code" class="block mt-1 w-full" type="text"
                name="postal_code" required autofocus autocomplete="postal_code" />
            <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
            {{-- @error('postal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
