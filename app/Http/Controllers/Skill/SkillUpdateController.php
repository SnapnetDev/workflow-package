<?php

namespace App\Http\Controllers\Skill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbSkill;


class SkillUpdateController extends Controller
{
    //
    function update(JbSkill $skill){
      return view('skill.edit',[
        'skill'=>$skill
      ]);
    }


    function updateAction(JbSkill $skill,Request $request){
      $data = $request->all();
      $skill->update([
         'name'=>$data['name']
      ]);

      return redirect('skills')->with(['message'=>'Skill updated.']);
    }
}
