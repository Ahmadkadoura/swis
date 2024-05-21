<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactionDriver extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'driver_id',
        'transaction_id',
    ];

    // Define relationships
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
