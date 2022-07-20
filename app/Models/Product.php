<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use NumberFormatter;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
        'photo',
        'name',
        'description',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

       public function getPriceParseAttribute($value)
    {
        $fmt = numfmt_create('pt-BR', NumberFormatter::CURRENCY);
        return numfmt_format_currency($fmt, $this->attributes['price'], 'BRL');
    }
}
