<?php
namespace App\Packages\Discipline;

class DisciplineSkillService implements DisciplineSkillPort{


    private $port = null;

    function addSkill()
    {
        return $this->port->addSkill();
    }

    function removeSkill()
    {
        return $this->port->removeSkill();
    }

    function getSkills($id)
    {
       return $this->port->getSkills();
    }



}
