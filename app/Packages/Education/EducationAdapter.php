<?php

namespace App\Packages\Education;

use App\Models\JbEducation;
use App\Packages\Crud\CrudPort;
use Auth;
use Illuminate\Http\Request;

class EducationAdapter implements CrudPort
{

    private $request = null;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    private function updateInput($model)
    {
        $model->name = $this->request->name;
        $model->created_by = Auth::user()->id;
    }

    private function getModel()
    {
        $id = $this->request->id;
        $model = JbEducation::find($id);
        return $model;
    }

    function getList()
    {
        return [
            'list' => JbEducation::orderBy('id','desc')->paginate(7)
        ];
    }

    function create()
    {
        $model = new JbEducation;
        $this->updateInput($model);
        $model->save();
        return [
            'message' => 'Education added',
            'data' => $model
        ];
    }

    function update()
    {
        $model = $this->getModel();
        $this->updateInput($model);
        $model->save();
        return  [
            'message' => 'Education saved',
            'data' => $model
        ];
    }

    function getItem($id)
    {
        return [
            'data' => JbEducation::find($id)
        ];
    }

    function delete()
    {
        $model = $this->getModel();
        $model->delete();
        return [
            'message' => 'Education removed',
            'data' => $model
        ];
    }

    function getCount()
    {
        return [
            'count' => JbEducation::count()
        ];
    }
}
