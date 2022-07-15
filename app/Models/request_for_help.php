<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_for_help extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','member_id ','office_id','status','proof_image','cancellation_reason'

    ];
    public function user(){
        return $this->belongsTo('App\Models\User','member_id');

    }
    public function office(){
        return $this->belongsTo('App\Models\Office','office_id');

    }


}
