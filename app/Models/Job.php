<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'roles_and_responsibility',
        'company',
        'hr_incharge',
        'email',
        'salary',
        'location',
        'job_category_id',
        'client_id',
        'experience_min',
        'experience_max',
        'currency_id',
        'salary_from',
        'salary_to'
    ];

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
