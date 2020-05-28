<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
        'code', 'name',	'country', 'gmt'
    ];
    protected $primaryKey = 'a_id';

}
