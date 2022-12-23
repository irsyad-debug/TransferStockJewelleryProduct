<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'team_leader', 'description', 'phone_num',
    ];

    public function stockTransfer()
    {
        return $this->hasOne(StockTransfer::class, 'team_id');
    }
}
