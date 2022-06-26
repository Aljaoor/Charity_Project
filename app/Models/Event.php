<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','count_of_volunteers','describe','title','where','from_date','to_date','location','count_of_request'
    ];
}
