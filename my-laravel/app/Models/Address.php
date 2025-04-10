<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'street',
        'city',
        'state',
        'area_code',
        'country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor to get full address
    public function getFullAddressAttribute()
    {
        return "{$this->street}, {$this->city}, {$this->state}, {$this->area_code}, {$this->country}";
    }
}
