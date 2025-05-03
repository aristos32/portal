<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *  Generic crm contract
 *  i.e trading account, insurance contract, etc
 */
class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'description',
        'balance',
        'notes',
        'last_transaction_at',
        'start_date',
        'expiry_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // using Laravel's attribute accessor convention
    public function getStatusAttribute()
    {
        return $this->expiry_date < now() ? __('expired') : __('active');
    }
}
