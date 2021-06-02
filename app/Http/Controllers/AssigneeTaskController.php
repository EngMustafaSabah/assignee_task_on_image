<?php

namespace App\Http\Controllers;

use App\Models\AssigneeTask;
use Illuminate\Http\Request;

class AssigneeTaskController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        AssigneeTask::create(
            $this->validate($request, [
                'department_id' => 'required',
                'user_id' => 'required',
                'project_id' => 'required',
                'status_id' => 'required',
                'priority_id' => 'required',
                'top' => 'required',
                'left' => 'required',
                'date' => 'required',
                'name' => 'required',
            ])
        );
        return redirect()->route('project');
    }
}
