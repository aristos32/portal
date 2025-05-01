<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Contract;

class ContractController extends Controller
{
    public function index()
    {
        // $user = Auth::user();

        // $contracts = $user->contracts;

        // return view('contracts.index', [
        //     'contracts' => $contracts,
        // ]);
    }

    public function create()
    {
        return view('contracts.create');
    }
}
