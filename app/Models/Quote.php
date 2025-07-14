<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Quote extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quote_number',
        'quote_date',
        'quote_duedate',
        'taxable',
        'customer_id',
        'vehicle_id',
        'odometer',
        'nextservicekms',
        'nextservicedate',
        'remarks',
        'jobdetails',
        'notes',
        'tire_fl',
        'tire_fr',
        'tire_rl',
        'tire_rr',
        'frontbrakepads',
        'rearbrakepads',
        'amtdue'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_quote')->withTimestamps()->withPivot(['jobtype', 'quantity', 'rate']);
    }
}
