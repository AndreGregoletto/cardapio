<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypePayment extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'name',
        'status'
    ];

    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
}
