<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_proof extends Model
{
    use HasFactory;
    protected $fillable = [
        "image_name","request_id"
    ];
}
