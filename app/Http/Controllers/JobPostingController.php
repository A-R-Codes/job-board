<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $job_postings = JobPosting::all();
        $data = compact('job_postings');
        return view('employer.job_postings.index', $data);
       
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employer.job_postings.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'salary' => 'required|integer',
            'vacancy' => 'required|integer',
            'deadline' => 'required|date',
        ]);

        $jobPosting = new JobPosting;
        $jobPosting->employer_id = auth()->id();
        $jobPosting->title = $request->title;
        $jobPosting->description = $request->description;
        $jobPosting->location = $request->location;
        $jobPosting->job_type = $request->job_type;
        $jobPosting->salary = $request->salary;
        $jobPosting->vacancy = $request->vacancy;
        $jobPosting->deadline = $request->deadline;
        $jobPosting->save();
        return redirect()->route('employer.job-postings.index')->with('success', 'Job posting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPosting $jobPosting)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPosting $jobPosting)
    {
        //
        return view('employer.job-postings.edit', compact('jobPosting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobPosting $jobPosting)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'salary' => 'required|integer',
            'vacancy' => 'required|integer',
            'deadline' => 'required|date',
        ]);

        $jobPosting->title = $request->title;
        $jobPosting->description = $request->description;
        $jobPosting->location = $request->location;
        $jobPosting->job_type = $request->job_type;
        $jobPosting->salary = $request->salary;
        $jobPosting->vacancy = $request->vacancy;
        $jobPosting->deadline = $request->deadline;
        $jobPosting->save();
        return redirect()->route('employer.job-postings.index')->with('success', 'Job posting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPosting $jobPosting)
    {
        //
        $jobPosting->delete();
        return redirect()->route('employer.job-postings.index')->with('success', 'Job posting deleted successfully.');
    }
}
