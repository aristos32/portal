<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Contract;
use App\Models\Customer;
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
        $customer = Customer::factory()->create();

        // Create a contract and associate it with the user
        $contract = Contract::factory()->create(['customer_id' => $customer->id]);

        // Act - Assert
        $this->assertInstanceOf(Customer::class, $contract->customer);
        $this->assertEquals($customer->id, $contract->customer->id);
    }
}
