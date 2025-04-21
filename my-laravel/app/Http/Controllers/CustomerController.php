<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {

        // Log the customer ID
        Log::info('customer show method called');
        Log::info('Request data:', ['request' => $request->all()]);
        // Find the customer by ID
        $id = $request->route('id');
        Log::info('Customer ID:', ['id' => $id]);


        // Find the customer by ID
        $customer = Customer::findorfail($id);
        Log::info('Customer found:', ['customer' => $customer]);
        if (!$customer) {
            // Handle the case where the customer is not found
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        // Show customer details
        return view('customers.show', [
            'customer' => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Customer $customer)
    {
        Log::info('customer update method called');
        Log::info('Request data:', ['request' => request()->all()]);

        dd(request()->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
