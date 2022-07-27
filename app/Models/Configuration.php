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

    protected $casts = [
        'open' => 'datetime:H:i:s',
        'close' => 'datetime:H:i:s',
    ];

    public function address()
    {
        return $this->morphOne(Address::class, 'owner');
    }

    public function getPhoneAttribute()
    {
        return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $this->attributes['phone']) ?? '';
    }

    public function getCellAttribute()
    {
        return preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2 $3-$4', $this->attributes['cell']) ?? '';
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
