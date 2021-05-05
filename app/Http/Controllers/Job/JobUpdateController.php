<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class JobUpdateController extends Controller
{
    //
    function update(JbJob $job){
      return view('job.edit',[
         'job'=>$job,
         'jb_recruitment_type_ids'=>JbRecruitmentType::all(),
         'certifications'=>JbCertification::all(),
         'skills'=>JbSkill::all(),
         'competencies'=>JbCompetence::all()
      ]);
    }


    function updateAction(JbJob $job,Request $request){
        $data = $request->all();
        $job->update([
         'role'=>$data['role'],
         'description'=>$data['description'],
         'jb_recruitment_type_id'=>$data['jb_recruitment_type_id'],
         'salary_range'=>$data['salary_range'],
         'address'=>$data['address'],
         'expiry_date'=>$data['expiry_date'],
         'years_of_experience'=>$data['years_of_experience']          
        ]);
        return redirect('jobs')->with(['message'=>'Job Updated.']);
    }
}
