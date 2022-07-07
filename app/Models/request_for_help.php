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
}
