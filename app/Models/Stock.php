<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','supplier', 'serving_unit', 'serving_qty','info','callories','nutrients', 'allergens', 'image'
    ];
    protected $casts = [
      'nutrients'=>'array',
    ];
}
