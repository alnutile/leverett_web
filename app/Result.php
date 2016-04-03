<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'results',
        'machine_id',
        'results_originally_created_at',
        'ip',
        'api_version',
        'tries'
    ];
}
