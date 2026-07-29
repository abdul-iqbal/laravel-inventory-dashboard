<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku', 'name', 'quantity', 'reorder_level'];
    protected function casts(): array { return ['quantity' => 'integer', 'reorder_level' => 'integer']; }
}
