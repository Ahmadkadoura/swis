<?php

namespace App\Models;

use App\Enums\sectorType;
use App\Enums\unitType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'code',
        'sectorType',
        'unitType',
        'size',
        'weight',
    ];
    protected $casts=[
        'unitType'=>unitType::class ,
        'sectorType'=>sectorType::class ,
    ];
}
