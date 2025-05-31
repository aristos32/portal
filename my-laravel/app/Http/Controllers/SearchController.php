<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Contract;

class SearchController extends Controller
{

    public function index()
    {
        return view('customers.search');
    }


    public function fillDashboard()
    {

        // find 10 customers most recently created
        $recentlyCreatedCustomers = Customer::orderBy('created_at', 'desc')->take(10)->get();

        // find 10 customers most recently updated
        $recentlyUpdatedCustomers = Customer::orderBy('updated_at', 'desc')->take(10)->get();

        // find 10 contracts most recently created
        $recentlyCreatedContracts = Contract::orderBy('created_at', 'desc')->take(10)->get();

        // This method can be used to fill the dashboard with initial data if needed
        return view('dashboard', [
            'recentlyCreatedCustomers' => $recentlyCreatedCustomers,
            'recentlyUpdatedCustomers' => $recentlyUpdatedCustomers,
            'recentlyCreatedContracts' => $recentlyCreatedContracts,
        ]);
    }


    public function search(Request $request)
    {
        $customers = null;

        // At least on of the fields is required
        $validated = $request->validate([
            'state-id' => 'nullable|integer',
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'at_least_one' => 'required_without_all:state-id,name,surname,email,phone',
        ]);

        $request->merge(['at_least_one' => 'value']);

        // Perform search logic here
        if ($validated['state-id']) {
            // Search by state ID
            $customers = Customer::where('identity_number', $validated['state-id'])->get();
        } else if ($validated['name']) {
            // Search by name
            $customers = Customer::whereRaw('LOWER(first_name) LIKE ?', ['%' . strtolower($validated['name']) . '%'])
                ->get();
        } else if ($validated['surname']) {
            // Search by surname
            $customers = Customer::whereRaw('LOWER(last_name) LIKE ?', ['%' . strtolower($validated['surname']) . '%'])
                ->get();
        } else if ($validated['email']) {
            // Search by email
            $customers = Customer::where('email', $validated['email'])->get();
        } else if ($validated['phone']) {
            // Search in phone or cellphone fields
            $customers = Customer::where('phone', $validated['phone'])
                ->orWhere('cellphone', $validated['phone'])
                ->get();
        }

        return view('customers.all', [
            'customers' => $customers,
        ]);
    }
}
