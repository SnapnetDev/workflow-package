<?php

namespace App\Http\Controllers\Skill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbSkill;
use App\User;

class SkillCreateController extends Controller
{
    //
    function create(User $user){
      return view('skill.create',[
         'user'=>$user
      ]);
    }


    function createAction(User $user,JbSkill $skill,Request $request){
      $data = $request->all();
      JbSkill::create([
        'name'=>$data['name'],
        'created_by'=>$user->id
      ]);
      return redirect('skills')->with(['message'=>'New Skill Added.']);
    }
}
