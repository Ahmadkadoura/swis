<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class donorItem extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'donor_id',
        'item_id',
        'quantity',
    ];

    /**
     * Get the donor that owns the DonorItem.
     */
    public function donor():BelongsTo
    {
        return $this->belongsTo(Donor::class);
    }

    /**
     * Get the item that is associated with the DonorItem.
     */
    public function item():BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
