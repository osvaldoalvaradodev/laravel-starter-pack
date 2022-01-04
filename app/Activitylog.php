<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitylog extends Model
{
    protected $fillable = [
        'type', 'description',
    ];
}
