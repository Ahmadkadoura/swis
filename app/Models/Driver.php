<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory,SoftDeletes;

  protected $fillable= [
      'id',
      'name',
      'vehicle_number',
      'national_id',
      'transportation_company_name',
      'phone',
  ];

  public function transactions()
  {
    return $this->belongsToMany(Transaction::class);
  }

}
