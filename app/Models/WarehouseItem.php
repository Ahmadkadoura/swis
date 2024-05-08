<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WarehouseItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'Warehouse_id',
        'Item_id',
        'quantity',
    ];
    public function item():BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
