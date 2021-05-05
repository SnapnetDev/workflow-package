<?php

namespace App\Packages\Discipline;

use App\JbDisciplines;
use App\Packages\Crud\CrudPort;
use Illuminate\Http\Request;

class DisciplineAdapter implements DisciplinePort
{

    private $request = null;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    private function getModel()
    {
        return JbDisciplines::find($this->request->id);
    }

    function create()
    {
        $model = new JbDisciplines;
        $model->name = $this->request->name;
        $model->save();
        return [
            'message' => 'New Discipline Added.',
            'data' => $model
        ];
    }

    function update()
    {
        $model = $this->getModel();
        $model->name = $this->request->name;
        $model->save();
        return [
            'message' => 'Discipline saved.',
            'data' => $model
        ];
    }

    function getList()
    {
        return [
            'list' => JbDisciplines::all()
        ];
    }

    function getItem($id)
    {
        return [
            'data' => JbDisciplines::find($id)
        ];
    }

    function delete()
    {
        $model = $this->getModel();
        $model->delete();
        return [
            'message' => 'Discipline removed.',
            'data' => $model
        ];
    }

    function getCount()
    {
        return [
            'count' => JbDisciplines::count()
        ];
    }
}
