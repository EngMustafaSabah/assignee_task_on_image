<?php

namespace App\Http\Controllers;

use App\Models\AssigneeTask;
use App\Models\Project;
use App\Models\Department;
use App\Models\PriorityOfTask;
use App\Models\StatusOfTask;
use App\Models\User;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            'project' => Project::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return Inertia::render('SingleProject', [
            'project' => $project->find(request('id')),
            'department' => Department::all(),
            'progress' => '40%',
            'status' => StatusOfTask::all(),
            'priority' => PriorityOfTask::all(),
            'users' => User::all(),
            'assignee' => AssigneeTask::where('project_id', request('id'))->with('StatusOfTask')->get(),
        ]);
    }

}
