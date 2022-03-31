<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_volunteer extends Model
{
    use HasFactory;
    protected $fillable=[

        'volunteer_id','event_id','id','status','cancellation_reason'
    ];
}
