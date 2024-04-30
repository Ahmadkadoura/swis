<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

  protected $fillable= [
      'id',
      'name',
      'vehicle_number',
      'national_id',
      'transportation_company_name',
      'phone',
  ];

}
