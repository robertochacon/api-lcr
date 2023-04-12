<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    protected $table = 'shipments';

    protected $fillable = [
        'entity_id','identification','longitudInput','latitudInput', 'longitudOuput', 'latitudOuput','delivery','time','note','status'
    ];
}
