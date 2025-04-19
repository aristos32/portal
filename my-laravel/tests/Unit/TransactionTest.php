<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Transaction;
use App\Models\Contract;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Transaction belongs to contract
     */
    public function test_transaction_belongs_to_contract(): void
    {
        ///AAA (Arrange, Act, Assert)///
        // Create a customer
        $customer = Customer::factory()->create();

        // Arrange
        // Create a contract
        $contract = Contract::factory()->create(['customer_id' => $customer->id]);

        // Create a transaction and associate it with the contract
        $transaction = Transaction::factory()->create(['contract_id' => $contract->id]);

        // Act - Assert
        $this->assertInstanceOf(Contract::class, $transaction->contract);
        $this->assertEquals($contract->id, $transaction->contract->id);
    }
}
