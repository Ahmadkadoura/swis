<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'Warehouse_id',
        'Item_id',
        'quantity',
    ];
    public function item():BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function warehouse():BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }
}
