<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entitys extends Model
{
    protected $table = 'entitys';

    protected $fillable = [
        'user_id','name', 'description','status','logo','address','phone',
    ];
}
