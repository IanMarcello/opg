<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'pay_number',
        'buyer',
        'third_party_id',
        'total_amount',
        'currency',
        'status',
        'remark',
        'mno',
        'type',
        'app_id',
    ];
}
