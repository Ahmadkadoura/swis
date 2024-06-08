<?php

namespace App\Models;

use App\Enums\transactionModeType;
use App\Enums\transctionType;
use App\Enums\transactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactionWarehouseItems extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'transaction_id',
        'warehouse_id',
        'transaction_type',
        'transaction_mode_type',
        'item_id',
        'quantity',
    ];

    protected $casts=[
        'transaction_type'=>transactionType::class ,
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
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
