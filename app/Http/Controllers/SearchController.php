<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd($request['q']);
        $jobs = Job::with('employer')->where('title', 'LIKE', "%" . htmlspecialchars($request['q']) . "%")->get();

        return view('jobs.results', ['jobs' => $jobs]);
    }
}
