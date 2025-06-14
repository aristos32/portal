<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\View\View;
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
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email',
        ], [
            'first_name.required' => 'Το όνομα είναι υποχρεωτικό',
            'first_name.string' => 'Το όνομα πρέπει να είναι κείμενο',
            'first_name.max' => 'Το όνομα δεν μπορεί να υπερβαίνει τους 255 χαρακτήρες',
            'last_name.required' => 'Το επώνυμο είναι υποχρεωτικό',
            'last_name.string' => 'Το επώνυμο πρέπει να είναι κείμενο',
            'last_name.max' => 'Το επώνυμο δεν μπορεί να υπερβαίνει τους 255 χαρακτήρες',
            'email.required' => 'Το email είναι υποχρεωτικό',
            'email.email' => 'Το email πρέπει να είναι έγκυρο',
            'email.max' => 'Το email δεν μπορεί να υπερβαίνει τους 255 χαρακτήρες',
            'email.unique' => 'Αυτό το email χρησιμοποιείται ήδη',
        ]);

        $customer = Customer::create($request->all());

        return redirect()->route('customers.show', ['id' => $customer->id]);
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


        $customer = Customer::findOrFail($id); // Load customer without eager loading

        if (!$customer) {
            // Handle the case where the customer is not found
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }


        $contracts = Contract::where('customer_id', $customer->id)
            ->orderByDesc('expiry_date')
            ->orderByDesc('balance')
            ->paginate(10);

        // Show customer details
        return view('customers.show', [
            'customer' => $customer,
            'contracts' => $contracts,
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
    public function update(Request $request)
    {
        Log::info('customer update method called');
        Log::info('Request data:', ['request' => $request->all()]);

        $id = $request->route('id');

        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identity_number' => 'nullable|string|max:255',
            'type' => 'nullable|string',
            'gender' => 'nullable|string',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'cellphone' => 'nullable|string|max:20',
            'profession' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
        ], [
            'first_name.required' => 'Το όνομα είναι υποχρεωτικό',
            'first_name.string' => 'Το όνομα πρέπει να είναι κείμενο',
            'first_name.max' => 'Το όνομα δεν μπορεί να υπερβαίνει τους 255 χαρακτήρες',
            'last_name.required' => 'Το επώνυμο είναι υποχρεωτικό',
            'last_name.string' => 'Το επώνυμο πρέπει να είναι κείμενο',
            'last_name.max' => 'Το επώνυμο δεν μπορεί να υπερβαίνει τους 255 χαρακτήρες',
            'identity_number.string' => 'Ο αριθμός ταυτότητας πρέπει να είναι κείμενο',
            'identity_number.max' => 'Ο αριθμός ταυτότητας δεν μπορεί να υπερβαίνει τους 255 χαρακτήρες',
            'type.string' => 'Ο τύπος πρέπει να είναι κείμενο',
            'gender.string' => 'Το φύλο πρέπει να είναι κείμενο',
            'email.required' => 'Το email είναι υποχρεωτικό',
            'email.email' => 'Το email πρέπει να είναι έγκυρο',
            'email.max' => 'Το email δεν μπορεί να υπερβαίνει τους 255 χαρακτήρες',
            'phone.string' => 'Το τηλέφωνο πρέπει να είναι κείμενο',
            'phone.max' => 'Το τηλέφωνο δεν μπορεί να υπερβαίνει τους 20 χαρακτήρες',
            'cellphone.string' => 'Το κινητό τηλέφωνο πρέπει να είναι κείμενο',
            'cellphone.max' => 'Το κινητό τηλέφωνο δεν μπορεί να υπερβαίνει τους 20 χαρακτήρες',
            'profession.string' => 'Η επάγγελμα πρέπει να είναι κείμενο',
            'profession.max' => 'Η επάγγελμα δεν μπορεί να υπερβαίνει τους 255 χαρακτήρες',
            'birthdate.date' => 'Η ημερομηνία γέννησης πρέπει να είναι έγκυρη',
        ]);

        // Log validated data
        Log::info('Validated data:', $validated);

        $customer = Customer::findorfail($id);
        $customer->first_name = $validated['first_name'];
        $customer->last_name = $validated['last_name'];
        $customer->identity_number = $validated['identity_number'];
        $customer->type = $validated['type'];
        $customer->gender = $validated['gender'];
        $customer->email = $validated['email'];
        $customer->phone = $validated['phone'];
        $customer->cellphone = $validated['cellphone'];
        $customer->profession = $validated['profession'];
        $customer->birthdate = $validated['birthdate'];
        $updated = $customer->save();

        // add new customer info
        // this is just an example
        // $customer->infos()->create([
        //     'key' => 'updated_at',
        //     'value' => now(),
        // ]);

        if (!$updated) {
            Log::error('Customer update failed', ['customer' => $customer]);
            return back()->withErrors(['error' => 'Failed to update customer']);
        }

        Log::info('Customer updated:', ['customer' => $customer, 'id' => $customer->id]);

        // Ensure ID exists
        if (!$customer->id) {
            Log::error('Customer ID is missing', ['customer' => $customer]);
            throw new \Exception('Customer ID is missing after update');
        }


        // Redirect to the customer show page
        return redirect()->route('customers.show', [
            'id' => $customer->id
        ])->with('status', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
