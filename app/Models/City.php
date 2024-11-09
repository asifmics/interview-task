<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name','state_id'];

    protected $casts = [
        'name' => 'string',
        'state_id' => 'int'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}

