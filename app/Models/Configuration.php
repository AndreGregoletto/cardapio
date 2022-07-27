<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'type',
        'phone',
        'cell',
        'open',
        'close',
        'delivery',
        'delivery_fee'
    ];

    public function address()
    {
        return $this->morphOne(Address::class, 'owner');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
