<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'users_id',
        'users_name',
        'users_email',
        'users_job_name'
    ];

    protected $primaryKey = 'users_id';

    protected $keyType = 'string';
}
