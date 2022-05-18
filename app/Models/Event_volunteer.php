<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event_volunteer extends Model
{
    use HasFactory;
    protected $fillable=[

        'volunteer_id','event_id','id','status','cancellation_reason'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','volunteer_id');

    }
    public function event(){
        return $this->belongsTo('App\Models\Event','event_id');

    }

}
