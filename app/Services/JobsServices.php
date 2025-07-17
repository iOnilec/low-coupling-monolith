<?php

namespace App\Services;

use App\Models\Job;


class JobsServices
{
    public function create_jobs($data)
    {
        return Job::create([
            'jobs_name' => $data,
        ]);
    }
}
