<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{

    protected $table = 'documents';

    protected $fillable = [
        'user_id','entity_id','name', 'description','status','identification','file',
    ];

}
