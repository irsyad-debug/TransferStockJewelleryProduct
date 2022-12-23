<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'team_id', 'total_transfer',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
