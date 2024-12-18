<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractTest extends TestCase
{
    use RefreshDatabase;

    /**
     * contract belongs to user
     */
    public function test_contract_belongs_to_user(): void
    {
        ///AAA (Arrange, Act, Assert)///

        // Arrange
        // Create a user
        $user = User::factory()->create();

        // Create a contract and associate it with the user
        $contract = Contract::factory()->create(['user_id' => $user->id]);

        // Act - Assert
        $this->assertInstanceOf(User::class, $contract->user);
        $this->assertEquals($user->id, $contract->user->id);
    }
}
