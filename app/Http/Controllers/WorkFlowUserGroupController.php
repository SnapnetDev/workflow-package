<?php

namespace App\Http\Controllers;

use App\Models\WorkFlowUserGroup;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class WorkFlowUserGroupController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        return $this->resolveResponse(WorkFlowUserGroup::addGroupToUser());
    }

    public function show(WorkFlowUserGroup $workFlowUserGroup)
    {
        //
    }

    public function edit(WorkFlowUserGroup $workFlowUserGroup)
    {
        //
    }

    public function update(Request $request, WorkFlowUserGroup $workFlowUserGroup)
    {
        //
    }

    public function destroy($id)
    {
        //
        return $this->resolveResponse(WorkFlowUserGroup::removeGroupMapping($id));
    }




}
