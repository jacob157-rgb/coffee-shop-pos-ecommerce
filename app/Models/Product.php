<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'isactive',
        'category_id',
        'name',
        'photo',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function productSku()
    {
        return $this->hasMany(ProductSku::class);
    }
}
