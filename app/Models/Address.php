<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'zipcode',
        'address',
        'number',
        'neighborhood',
        'city',
        'state',
        'complement'
    ];

    public function owner()
    {
        return $this->morphTo(Address::class);
    }

    public function getPlaceAttribute()
    {
        return $this->attributes['address'] = "{$this->attributes['address']},  {$this->attributes['number']}";
    }

}
