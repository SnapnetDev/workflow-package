<?php

namespace App\Http\Controllers\Skill;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;

use App\Models\JbSkill;
use App\Packages\Crud\CrudService;
use App\Packages\Discipline\DisciplineAdapter;
use App\Packages\Skill\SkillAdapter;
use Illuminate\Http\Request;
use App\Packages\Discipline\DisciplinePort;

class SkillController extends BaseController
{

    public function index(Request $request,DisciplinePort $disciplinePort)
    {
        $crudService = new CrudService(new SkillAdapter($request));
        $data = $crudService->getList();

//         $crudService = new CrudService(new DisciplineAdapter($request));

        $data['disciplines'] = $disciplinePort->getList();  //$crudService->getList();

        //
        return view('skill.index', $data);
    }

    public function create(Request $request,DisciplinePort $disciplinePort)
    {
        //
//         $crudService = new CrudService(new DisciplineAdapter($request));
        $data = $disciplinePort->getList(); //$crudService->getList();
        return view('skill.create',$data);
    }

    public function store(Request $request)
    {
        $crudService = new CrudService(new SkillAdapter($request));
        $response = $crudService->create();
        return redirect(route('skill.create'))->with($response);
    }

    public function show(JbSkill $skill)
    {
        //

    }

    public function edit($skill, Request $request,DisciplinePort $disciplinePort)
    {
        $crudService = new CrudService(new SkillAdapter($request));
        $data = $crudService->getItem($skill);

//         $crudService = new CrudService(new DisciplineAdapter($request));
        $data['list'] = $disciplinePort->getList();  //$crudService->getList();

        //
        return view('skill.edit', $data);
    }

    public function update(Request $request, JbSkill $skill)
    {
        $crudService = new CrudService(new SkillAdapter($request));
        $response = $crudService->update();
        return redirect(route('skill.edit',[$response['data']->id]))->with($response);
    }


    public function destroy($skill, Request $request)
    {
        $crudService = new CrudService(new SkillAdapter($request));
        $response = $crudService->delete();
        return redirect(route('skill.index'))->with($response);
    }
}
