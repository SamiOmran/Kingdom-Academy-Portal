<?php

namespace App\Http\Resources\Coach;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowCoachResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $removeFields = ['first_name', 'middle_name', 'last_name'];
        $data = array_diff_key(parent::toArray($request), array_flip($removeFields));

        return [
            'full_name' => $this->fullName,
            'age' => $this->age,
            'img' => $this->img,
            ...$data,
        ];
    }
}
