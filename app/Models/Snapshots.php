<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snapshots extends Model
{
    use HasFactory;
    protected $table = 'snapshots';
    protected $fillable = [
        'transaction_id',
        'snapshot_data'
    ];
}
