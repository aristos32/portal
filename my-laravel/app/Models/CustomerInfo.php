<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerInfo extends Model
{

    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
