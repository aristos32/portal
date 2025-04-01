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
            'phone' => 'nullable|integer',
            'at_least_one' => 'required_without_all:state-id,name,surname,email,phone',
        ]);

        $request->merge(['at_least_one' => 'value']);

        // Perform search logic here
        if ($validated['state-id']) {
            // Search by state ID
            $users = User::where('identityNumber', $validated['state-id'])->get();
        }

        return view('users', [
            'users' => $users,
        ]);
    }
}
