<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'image', 'status'
    ];

    public function attactproducts()
          {
            return $this->hasMany(AttachProduct::class, 'product_id');
          }
}
