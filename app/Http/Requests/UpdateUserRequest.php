<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'last_name' => ['sometimes', 'required', 'string', 'max:255'],
            'first_name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                // 'exists:users,id'.$this->email,
            ],
            'is_admin' => ['sometimes','required|integer|in:0,1'],
            'country_id' => ['sometimes', 'required', 'integer', 'max:255', 'exists:countries,id'.$this->id],
            'state_id' => ['sometimes', 'required', 'integer', 'max:255', 'exists:states,id'.$this->id],
            'city_id' => ['sometimes', 'required', 'integer', 'max:255', 'exists:cities,id'.$this->id],

            'line1' => ['sometimes', 'required', 'string', 'max:255', 'default' => ''],
            'line2' => ['sometimes', 'nullable', 'string', 'max:255', 'default' => ''],
            'street' => ['sometimes', 'required', 'string', 'max:255', 'default' => ''],
            'postal_code' => ['sometimes', 'required', 'string', 'max:255', 'regex:/^[A-Za-z0-9]{5,}$/'],
        ];
    }
}
