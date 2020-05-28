<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
 	protected $fillable = [
        'code', 'fly_from',	'fly_to', 'fly_from_time','fly_to_time'
    ];
}
