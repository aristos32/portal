<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class HomeController extends Controller
{
    public function index()
    {

        // get 10 most recently updated customers
        $customers = Customer::orderBy('updated_at', 'desc')->take(10)->get();

        return view('home', [
            'customers' => $customers,
        ]);
    }
}
