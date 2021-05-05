<?php
namespace App\Packages\WorkExperience;

use App\Models\JbCandidateWorkExperience;
use App\Packages\Crud\CrudPort;

class WorkExperienceAdapter implements CrudPort{


    private $request = null;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function getList()
    {

    }

    function getItem($id)
    {

    }

    function create()
    {

    }

    function update()
    {

    }

    function delete()
    {

    }

    function getCount()
    {

    }

    private function getModel(){
        $id = $this->request->id;
        // $model = JbCandidateWorkExperience
    }



}
