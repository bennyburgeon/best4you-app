<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Client;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats()
    {
        return response()->json([
            'jobs' => Job::count(),
            'applications' => JobApplication::count(),
            'clients' => Client::count(),
            'categories' => JobCategory::count(),
        ]);
    }
}
