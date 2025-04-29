<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the customer of the business.
 * It cannot login to the system, as opposed to the user.
 */
class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'identity_number',
        'identity_type',
        'type',
        'gender',
        'email',
        'phone',
        'cellphone',
        'profession',
        'birthdate',
        'nationality',
    ];

    public function infos()
    {
        return $this->hasMany(CustomerInfo::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function latestTransaction()
    {
        return $this->hasOne(Transaction::class)->latestOfMany();
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function employers()
    {
        return $this->hasMany(Employer::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    // get first address as string
    public function getFirstAddress()
    {
        if ($this->addresses()->count() === 0) {
            return null;
        }
        return $this->addresses()->first()->getFullAddress();
    }
}
