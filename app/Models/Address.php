<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillabel = [
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
        return $this->morphTo();
    }

    // public function getPlaceAttribute()
    // {
    //     return $this->attributes['address'] = "{$this->attributes['address']},  {$this->attributes['number']}";
    // }

}
