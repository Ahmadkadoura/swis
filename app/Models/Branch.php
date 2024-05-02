<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'parent_id',
        'phone',
        'address',
    ];

    public function warehouse(){
        return $this->hasMany(Warehouse::class);
    }
}
