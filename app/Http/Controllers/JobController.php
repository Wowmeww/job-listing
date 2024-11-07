<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with('employer')->get()->groupBy('featured');

        return \view('jobs.index', [
            'featuredJobs' => $jobs['1'],
            'jobs' => $jobs['0'],
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            "title" => ['required'],
            "salary" => ['required'],
            "location" => ['required'],
            "schedule" => ['required', Rule::in(['Full Time', 'Part Time'])],
            'tags' => ['nullable'],
            "url" => ['required'],
        ]);
        $field['featured'] = $request->has('featured');
        $job = Auth::user()->employer->jobs()->create(Arr::except($field, 'tags'));

        if($field['tags'] ?? false) {
            foreach (explode(',', $field['tags']) as $value) {
                $job->tag(trim($value));
            }
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
