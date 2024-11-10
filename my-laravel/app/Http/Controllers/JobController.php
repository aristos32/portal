<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3); //eager loading - to avoid N+1 problem

        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }
}
