<?php

namespace App\Models;

use App\Enums\transactionModeType;
use App\Enums\transctionType;
use App\Enums\transType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactionWarehouse extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'transaction_id',
        'warehouse_id',
        'transaction_type',
        'transaction_type_ar',
        'transaction_mode_type',
        'transaction_mode_type_ar',
    ];

    protected $casts=[
        'transaction_type'=>transType::class ,
        'transaction_mode_type'=>transactionModeType::class ,
    ];
    // Define relationships
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
