<?php

namespace App\Http\Requests\Player;

use App\Data\PlayerDTO;
use App\Enums\PlayerSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlayerRequest extends FormRequest
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
            'first_name' => ['required', 'sometimes',  'string', 'max:255'],
            'middle_name' => ['required', 'sometimes',  'string', 'max:255'],
            'last_name' => ['required', 'sometimes',  'string', 'max:255'],
            'phone' => ['required', 'sometimes',  'string', 'max:13', 'min:10'],
            'city' => ['required', 'sometimes',  'string'],
            'address' => ['required', 'sometimes',  'string'],
            'dob' => ['required', 'sometimes',  'date'],
            'size' => ['required', 'sometimes',  'string', 'max:3', Rule::in(PlayerSize::values())],
            'start_date' => ['required', 'sometimes',  'date', 'before:tomorrow'],
            'active' => ['required', 'sometimes',  'boolean'],
            'notes' => ['string'],
        ];
    }

    public function toDTO(): PlayerDTO
    {
        $data = $this->validated();

        return PlayerDTO::from($data);
    }

    public function messages(): array
    {
        return [
            'phone' => 'Please make sure the phone number is correct',
        ];
    }
}
