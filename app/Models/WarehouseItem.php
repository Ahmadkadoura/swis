<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'Warehouse_id',
        'Item_id',
        'quantity',
    ];
    public function item(){
        return $this->belongsToMany(Item::class);
    }
}
