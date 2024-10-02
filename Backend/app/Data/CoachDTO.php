<?php

namespace App\Data;

use Spatie\LaravelData\{
  Data,
  Optional,
};

class CoachDTO extends Data
{
  public function __construct(
    public Optional|string $first_name,
    public Optional|string $middle_name,
    public Optional|string $last_name,
    public Optional|string $phone,
    public Optional|string $email,
    public Optional|string $password,
    public Optional|string $days_of_work,
    public Optional|string $dob,
    public Optional|string $img,
    //
  ) {
  }
}
