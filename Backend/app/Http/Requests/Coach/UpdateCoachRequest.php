<?php

namespace App\Http\Requests\Coach;

use App\Data\CoachDTO;
use App\Enums\CoachSize;
use App\Models\Coach;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCoachRequest extends FormRequest
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
            'first_name' => ['required', 'sometimes', 'string', 'max:255'],
            'middle_name' => ['required', 'sometimes', 'string', 'max:255'],
            'last_name' => ['required', 'sometimes', 'string', 'max:255'],
            'phone' => ['required', 'sometimes', 'string', 'max:13', 'min:10'],
            'email' => ['required', 'sometimes', 'email', 'max:255', 'unique'.Coach::class],
            'password' => ['required', 'sometimes', 'string'],
            'dob' => ['required', 'sometimes', 'date'],
        ];
    }

    public function toDTO(): CoachDTO
    {
        $data = $this->validated();

        return CoachDTO::from($data);
    }

    public function messages(): array
    {
        return [
            'phone' => 'Please make sure the phone number is correct',
        ];
    }
}
