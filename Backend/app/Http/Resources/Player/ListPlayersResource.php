<?php

namespace App\Http\Resources\Player;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListPlayersResource extends JsonResource
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
            'start_date' => $data->start_date->toDateString(),  
        ];
    }
}
