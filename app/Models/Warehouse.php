<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function warehouse(){
        return$this->hasMany(WarehouseItem::class);
    }

}
