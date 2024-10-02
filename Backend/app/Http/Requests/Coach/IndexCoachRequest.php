<?php

namespace App\Http\Requests\Coach;
use App\Http\Requests\PaginationIndexRequest;

class IndexCoachRequest extends PaginationIndexRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
