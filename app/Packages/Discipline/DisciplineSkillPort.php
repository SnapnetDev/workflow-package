<?php
namespace App\Packages\Discipline;


interface DisciplineSkillPort{


     function addSkill();
     function getSkills($id);
     function removeSkill();


}
