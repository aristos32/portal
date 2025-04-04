<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $users = null;

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
            $users = User::where('identity_number', $validated['state-id'])->get();
        } else if ($validated['name']) {
            // Search by name
            $users = User::whereRaw('LOWER(first_name) LIKE ?', ['%' . strtolower($validated['name']) . '%'])
                ->get();
        } else if ($validated['surname']) {
            // Search by surname
            $users = User::whereRaw('LOWER(last_name) LIKE ?', ['%' . strtolower($validated['surname']) . '%'])
                ->get();
        } else if ($validated['email']) {
            // Search by email
            $users = User::where('email', $validated['email'])->get();
        } else if ($validated['phone']) {
            // Search in phone or cellphone fields
            $users = User::where('phone', $validated['phone'])
                ->orWhere('cellphone', $validated['phone'])
                ->get();
        }
        return view('users', [
            'users' => $users,
        ]);
    }
}
