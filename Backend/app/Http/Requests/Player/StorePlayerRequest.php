<?php

namespace App\Http\Requests\Player;

use App\Data\PlayerDTO;
use App\Enums\PlayerSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePlayerRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13', 'min:10'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'size' => ['required', 'string', 'max:3', Rule::in(PlayerSize::values())], // PlayerSize::values()
            'start_date' => ['required', 'date', 'before:tomorrow'],
            'active' => ['required', 'boolean'],
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
