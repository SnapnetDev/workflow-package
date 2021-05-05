<?php

namespace App\Http\Controllers\Skill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbSkill;

class SkillListController extends Controller
{
    //

    function index(JbSkill $skill){

    	 return view('skill.index',[
           'skills'=>$skill::all()
    	 ]);

    }
}
