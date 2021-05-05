<?php

namespace App\Http\Controllers\RecruitmentType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jb\JbRecruitmentType;

class RecruitmentTypeUpdateController extends Controller
{
    //


    function update(JbRecruitmentType $recruitmentType){
      
      return view('recruitment_type.edit',[
          'recruitmentType'=>$recruitmentType
      ]);

    }

    function updateAction(JbRecruitmentType $recruitmentType,Request $request){
        $data = $request->all();
        $recruitmentType->update([
            'name'=>$data['name']
        ]);
        return redirect('recruitment-types')->with(['message'=>'Recruitment Type Saved.']);
 
    }

}
