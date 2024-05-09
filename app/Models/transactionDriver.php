<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionDriver extends Model
{
    use HasFactory;
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
