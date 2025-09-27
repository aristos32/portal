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

    public function show($locale, Contract $contract)
    {
        return view('contracts.show', [
            'contract' => $contract,
        ]);
    }

    public function edit($locale, Contract $contract)
    {
        return view('contracts.edit', [
            'contract' => $contract,
        ]);
    }

    public function update($locale, Contract $contract)
    {
        return view('contracts.update', [
            'contract' => $contract,
        ]);
    }

    public function destroy($locale, Contract $contract)
    {
        return view('contracts.destroy', [
            'contract' => $contract,
        ]);
    }

    public function create()
    {
        return view('contracts.create');
    }
}
