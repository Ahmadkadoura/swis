<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactionItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'item_id',
        'transaction_id',
        'quantity'
    ];

    // Define relationships
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
