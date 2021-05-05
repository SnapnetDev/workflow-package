<?php

namespace App\Http\Controllers\Skill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbSkill;


class SkillDeleteController extends Controller
{
    //
    function deleteAction(JbSkill $skill){
    	$skill->delete();
    	return redirect('skills')->with(['message'=>'Skill removed.']);
    }
}
