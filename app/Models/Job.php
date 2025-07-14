<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'quantity',
        'rate',
        'has_description'
    ];

    public function descriptions()
    {
        return $this->hasMany(Description::class);
    }

    public function quotes(): BelongsToMany
    {
        return $this->belongsToMany(Quote::class, 'job_quote')->withTimestamps()->withPivot(['jobtype', 'quantity', 'rate']);
    }
}
