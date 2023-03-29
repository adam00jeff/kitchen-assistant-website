<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidentreport extends Model
{
    use HasFactory;
    protected $fillable =[
      'date_of_report','date_of_incident','time_of_incident','incident_type','location','description','action_taken','reported_by','created_at','updates_at','user_id','business_id'
    ];
}