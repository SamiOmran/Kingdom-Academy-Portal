<?php

namespace App\Http\Resources\Coach;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListCoachesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = $this;

        return [
            'id' => $data->id,
            'full_name' => $data->full_name,
            'age' => $data->age,
            'days_of_work' => $data->days_of_work,
        ];
    }
}
