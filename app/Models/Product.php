<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'description', 'quantity_in_stock', 'quantity_in_transfer', 'status'
    ];

    public function stockTransfer()
    {
        return $this->hasOne(StockTransfer::class, 'product_id');
    }
}
