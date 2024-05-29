<?php

namespace App\Models;

use App\Enums\sectorType;
use App\Enums\unitType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'name',
        'code',
        'sectorType',
        'unitType',
        'size',
        'weight',
        'quantity',
    ];
    protected $casts=[
        'unitType'=>unitType::class ,
        'sectorType'=>sectorType::class ,
    ];

    public function transactionItem()
    {
        return $this->hasMany(transactionItem::class);
    }
    public function warehouseItem(){
        return $this->hasOne(WarehouseItem::class);
    }
    public function donorItems(): HasMany
    {
        return $this->hasMany(donorItem::class);
    }
}
