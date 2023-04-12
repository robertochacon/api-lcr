<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliverys extends Model
{
    protected $table = 'deliverys';

    protected $fillable = [
        'user_id','entity_id','identification','image','phone', 'email', 'address','type_vehicle','brand','license_plate','color','status'
    ];
}
