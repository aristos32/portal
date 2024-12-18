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
        'is_active',
        'notes',
        'last_transaction_at',
        'start_date',
        'expiry_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
