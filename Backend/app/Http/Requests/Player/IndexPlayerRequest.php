<?php

namespace App\Http\Requests\Player;
use App\Http\Requests\PaginationIndexRequest;

class IndexPlayerRequest extends PaginationIndexRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
