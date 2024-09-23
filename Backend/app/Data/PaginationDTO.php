<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class PaginationDTO extends Data
{
    public function __construct(
        public readonly ?int $pageSize,
        public readonly ?string $page,
        public readonly ?string $keyword,
    ) {
        //
    }
}