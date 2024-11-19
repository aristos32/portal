<?php

namespace App\Policies;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContractPolicy
{
    public function edit(User $user, Contract $contract): bool
    {
        return $user->id === $contract->user_id;
    }
}
