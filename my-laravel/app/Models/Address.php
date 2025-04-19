<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'type',
        'street',
        'city',
        'state',
        'area_code',
        'country',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Accessor to get full address
    public function getFullAddress()
    {
        return "{$this->street}, {$this->city}, {$this->state}, {$this->area_code}, {$this->country}";
    }
}
