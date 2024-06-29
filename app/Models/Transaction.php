<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'cart_id',
        'notes',
        'serving_type',
        'order_type',
        'payment_method',
        'payment_status',
        'order_created',
        'order_finished'
    ];
}
