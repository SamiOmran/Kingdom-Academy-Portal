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
    public string $first_name,
    public string $middle_name,
    public string $last_name,
    public string $phone,
    public string $city,
    public string $address,
    public Optional|string $notes,
    public PlayerSize $size,
    public string $dob,
    public Optional|bool $active,
    public Optional|string $start_date,
    //
  ) {
  }
}
