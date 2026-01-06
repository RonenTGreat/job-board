<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', JobPost::class);
        $filters = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category');

        return view('job.index', ['jobs' => JobPost::with('employer')->latest()->filter($filters)->get()]);
    }



    /**
     * Display the specified resource.
     */
    public function show(JobPost $job)
    {

        $this->authorize('view', $job);
        return view('job.show', ['job' => $job->load('employer.jobs')]);
    }
}
