<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeIsActive($query)
    {
        $query->where('status', 'active');
    }

    public function scopeIsInactive($query)
    {
        $query->where('status', 'inactive');
    }
}
