<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
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
        ];
    }
}
