<?php

namespace App\Packages\Region;

use App\JbRegions;
use App\Packages\Crud\CrudPort;
use Illuminate\Http\Request;

class RegionAdapter implements RegionPort
{

    private $request = null;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function getList()
    {
        return [
            'list' => JbRegions::all()
        ];
    }

    function create()
    {
        $model = new JbRegions;
        $model->name = $this->request->name;
        $model->save();
        return [
            'message' => 'New Region Added.',
            'data' => $model
        ];
    }

    function update()
    {
        $id = $this->request->id;
        $model = JbRegions::find($id);
        $model->name = $this->request->name;
        $model->save();
        return [
            'message' => 'Region Updated.',
            'data' => $model
        ];
    }

    function delete()
    {
        $id = $this->request->id;
        $model = JbRegions::find($id);
        $model->delete();
        return [
            'message' => 'Region Removed.',
            'data' => $model
        ];
    }

    function getItem($id)
    {
        return [
            'data' => JbRegions::find($id)
        ];
    }

    function getCount()
    {
        return [
            'count' => JbRegions::count()
        ];
    }
}
