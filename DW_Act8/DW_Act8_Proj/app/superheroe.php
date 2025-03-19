<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class superheroe extends Model
{
    protected $fillable = [
        'name', 'real_name', 'hero_image', 'details'
    ];
}
