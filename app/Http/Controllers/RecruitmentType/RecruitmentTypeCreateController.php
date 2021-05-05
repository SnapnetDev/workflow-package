<?php

namespace App\Http\Controllers\RecruitmentType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Jb\JbRecruitmentType;

class RecruitmentTypeCreateController extends Controller
{
    //
    function create(User $user){
      return view('recruitment_type.create',[
          'user'=>$user
      ]);
    }

    function createAction(User $user,Request $request){
     $data = $request->all();
     JbRecruitmentType::create([
       'name'=>$data['name'],
       'created_by'=>$user->id
     ]);
     return redirect('recruitment-types')->with(['message'=>'Recruitment Type Added.']);    
    }
    
}
