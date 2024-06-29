<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Categories extends Model
{
    use HasFactory, Searchable;
    protected $table = 'categories';
    protected $fillable = ['name'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
