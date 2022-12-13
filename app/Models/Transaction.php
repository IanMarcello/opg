<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'third_party_id',
        'amount',
        'currency',
        'status',
        'remark',
        'order_id',
    ];
}
