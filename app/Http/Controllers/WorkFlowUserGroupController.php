<?php

namespace App\Http\Controllers;

use App\Models\WorkFlowGroup;
use App\Models\WorkFlowUserGroup;
use App\Traits\ResponseTrait;
use App\User;
use Illuminate\Http\Request;

class WorkFlowUserGroupController extends Controller
{

    use ResponseTrait;


    function loadUsers(){
        $this->data['users'] = User::query()->whereIn('role',['admin','user'])->paginate(20);
    }

    function loadGroups(){
        $this->data['groups'] = WorkFlowGroup::query()->get();
    }

    public function index()
    {
        //
        $this->loadUsers();
        $this->loadGroups();

        return view('workflow_user_groups.index',$this->data);

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

    public function destroy($email)
    {
        //
        return $this->resolveResponse(WorkFlowUserGroup::removeGroupEmailMapping($email));
    }


}
