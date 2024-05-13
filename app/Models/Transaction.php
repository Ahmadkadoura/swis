<?php

namespace App\Models;

use App\Enums\transactionStatusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'donor_id',
        'warehouse_id',
        'is_convoy',
        'notes',
        'code',
        'status',
        'date',
        'waybill_num',
        'waybill_img',
        'qr',
    ];

    protected $casts = [
        'status'=>transactionStatusType::class,
    ];

    public function donor():BelongsTo
    {
        return $this->belongsTo(Donor::class);
    }

    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }

    public function warehouse():BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }
}
