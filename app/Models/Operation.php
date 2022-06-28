<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operation extends Model
{
    use HasFactory; 
    protected $fillable = [
        'user_id',
        'day',
        'open',
        'close'
    ];

    public function user()
    {
        return $this->belongs(User::class);
    }
}
