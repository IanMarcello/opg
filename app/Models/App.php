<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;
    
    public $fillable = [
        'name',
        'description',
        'status',
        'disburse_account',
        'disburse_mno',
        'disburse_bank',
        'user_id',
    ];
    
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'status' => 'string',
        'disburse_account' => 'string',
        'disburse_mno' => 'string',
        'disburse_bank' => 'string',
        'user_id' => 'integer',
    ];
    
    public static $rules = [
        'name' => 'nullable|string',
        'description' => 'nullable|string',
        'status' => 'required|string',
        'disburse_account' => 'nullable|string',
        'disburse_mno' => 'nullable|string',
        'disburse_bank' => 'nullable|string',
        'user_id' => 'nullable|integer',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
    ];
}
