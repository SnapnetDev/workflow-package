<?php
namespace App\Packages\Discipline;

use Illuminate\Http\Request;

class DisciplineSkillAdapter implements DisciplineSkillPort{


    private $request = null;


    function __construct(Request $request)
    {
        $this->request = $request;
    }


    function addSkill()
    {

    }

    function getSkills($id)
    {

    }

    function removeSkill()
    {

    }


}
