<?php

namespace App\Packages\Certification;

use App\Models\JbCertification;
use App\Packages\Crud\CrudPort;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CertificationAdapter implements CrudPort
{


    private $request = null;

    function __construct(Request $request)
    {
        $this->request = $request;
//         dd(Auth::user());
    }

    function getList()
    {
        return [
            'list' => JbCertification::orderBy('id','desc')->get()
        ];
    }

    function getItem($id)
    {
        return [
            'data' => JbCertification::find($id)
        ];
    }

    private function updateInput($model)
    {
        $model->name = $this->request->name;
        $model->created_by = Auth::user()->id;
    }

    private function getModel()
    {
        $id = $this->request->id;
        $model = JbCertification::find($id);
        return $model;
    }

    function create()
    {
        $model = new JbCertification;
        $this->updateInput($model);
        $model->save();
        return [
            'message' => 'Certification added',
            'data' => $model
        ];
    }

    function update()
    {
        $model = $this->getModel();
        $this->updateInput($model);
        $model->save();
        return [
            'message' => 'Certification saved',
            'data' => $model
        ];
    }

    function delete()
    {
        $model = $this->getModel();
        $model->delete();
        return [
            'message' => 'Certification removed'
        ];
    }

    function getCount()
    {
        return [
            'count' => JbCertification::count()
        ];
    }
}
