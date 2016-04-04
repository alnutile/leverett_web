<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $casts = [
        'results' => 'json',
    ];

    protected $fillable = [
        'results',
        'machine_id',
        'results_originally_created_at',
        'ip',
        'api_version',
        'tries'
    ];

    public function getResultsAttribute($value)
    {
        return json_encode($value, JSON_PRETTY_PRINT);
    }
}
