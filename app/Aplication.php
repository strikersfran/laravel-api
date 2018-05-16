<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    protected $fillable = [
        'name', 'description', 'api_key', 'api_secret', 'status'
    ];

    protected $primaryKey = 'id';

    protected $table = 'aplication';

}
