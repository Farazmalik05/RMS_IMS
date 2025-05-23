<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'name',
        'phoneno',
        'altphoneno',
        'abn',
        'address',
        'suburb',
        'state',
        'postcode',
        'email',
        'company_name',
        'warn'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
