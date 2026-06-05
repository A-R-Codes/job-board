<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'location',
        'job_type',
        'salary',
        'vacancy',
        'deadline',
        'status',
        'employer_id',
    ];
}
