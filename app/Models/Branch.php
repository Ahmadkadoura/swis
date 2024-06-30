<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'name_ar',
        'code',
        'parent_id',
        'phone',
        'address',
        'address_ar',
    ];

    public function warehouse(){
        return $this->hasMany(Warehouse::class);
    }
    public function parentBranch():BelongsTo
    {
        return $this->belongsTo(Branch::class, 'parent_id');
    }
}
