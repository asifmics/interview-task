<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    protected $fillable = ['name','country_id'];

    protected $casts = [
        'name' => 'string',
        'country_id' => 'int',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo( Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
