<?php

namespace App\Data;

use App\Enums\PlayerSize;
use Spatie\LaravelData\{
  Data,
  Optional,
};

class PlayerDTO extends Data
{
  public function __construct(
    public Optional|string $first_name,
    public Optional|string $middle_name,
    public Optional|string $last_name,
    public Optional|string $phone,
    public Optional|string $city,
    public Optional|string $address,
    public Optional|string $notes,
    public Optional|PlayerSize $size,
    public Optional|string $dob,
    public Optional|bool $active,
    public Optional|string $start_date,
    //
  ) {
  }
}
