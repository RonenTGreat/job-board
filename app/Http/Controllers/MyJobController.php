<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\JobPost;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAnyEmployer', JobPost::class);
        $jobs = auth()->user()->employer
            ->jobs()
            ->with(['employer', 'jobApplications', 'jobApplications.user'])
            ->withTrashed()
            ->get();

        return view('my_jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', JobPost::class);
        return view('my_jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $this->authorize('create', JobPost::class);
        auth()->user()->employer->jobs()->create($request->validated);

        return redirect()->route('my_jobs.index')
            ->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $myJob)
    {
        $this->authorize('update', $myJob);

        return view('my_jobs.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, JobPost $myJob)
    {
        $this->authorize('update', $myJob);
        $myJob->update($request->validated());

        return redirect()->route('my_jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $myJob)
    {
        $myJob->delete();

        return redirect()->route('my_jobs.index')->with('success', 'Job deleted.');
    }
}
