<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $guarded = ['id'];
    
    public $timestamps = false;
}