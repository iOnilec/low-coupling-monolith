<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'jobs_id',
        'jobs_name',
    ];

    protected $primaryKey = 'jobs_id';
}
