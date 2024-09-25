<?php

namespace App\Models;

use App\Enums\PlayerSize;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTimestamps;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'phone',
        'city',
        'address',
        'notes',
        'size',
        'active',
        'start_date',
        'dob'
    ];

    protected $casts = [
        'dob' => 'date:Y-m-d',
        'start_date' => 'date:Y-m-d',
        'active' => 'bool',
    ];

    protected $appends = [
        'age',
    ];

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    public function getAgeAttribute(): int
    {
        return $this->dob->age;
    }

    public function getFullNameAttribute(): string
    {
        return ucwords("$this->first_name $this->middle_name $this->last_name");
    }
}
