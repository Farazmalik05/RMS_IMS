<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Description extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'job_id',
        'description',
        'description_rate'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
