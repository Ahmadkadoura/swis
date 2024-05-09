<?php

namespace App\Models;

use App\Enums\transactionModeType;
use App\Enums\transctionType;
use App\Enums\transType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionWarehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'warehouse_id',
        'transaction_type',
        'transaction_mode_type',
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
