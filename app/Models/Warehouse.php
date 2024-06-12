<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use MatanYadaev\EloquentSpatial\Objects\Point;

class Warehouse extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'location',
        'branch_id',
        'capacity',
        'parent_id',
        'user_id',
        'is_Distribution_point',
    ];
    protected $casts = [
        'location' => Point::class,
    ];
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function warehouseItem(){
        return$this->hasMany(WarehouseItem::class);
    }
    public function parentWarehouse():BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'parent_id');
    }

    public function transactionWarehouseItem()
    {
        return $this->hasMany(transactionWarehouseItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
