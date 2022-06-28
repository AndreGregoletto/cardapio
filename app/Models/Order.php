<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Product;
use App\Models\TypePayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
     
    protected $fillable = [
      'client_id',
      'type_payment_id',
      'date',
      'delivery',
      'description'  
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function typePayment()
    {
        return $this->belongsTo(TypePayment::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
