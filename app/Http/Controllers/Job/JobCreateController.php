<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbJob;
use App\Jb\JbRecruitmentType;
use App\User;
use App\Jb\JbJobCertification;
use App\Jb\JbJobSkill;
use App\Jb\JbJobCompetence;
use App\Jb\JbJobRecruitementType;




class JobCreateController extends Controller
{
    //

    function create(User $user,JbJob $job){
      return view('job.create',[
       'jb_recruitment_type_ids'=>JbRecruitmentType::all(),
       'user'=>$user
      ]);
    }

    function createAction(User $user,JbJob $job,Request $request){
       $data = $request->all();
       $job::create([
         'role'=>$data['role'],
         'description'=>$data['description'],
         'jb_recruitment_type_id'=>$data['jb_recruitment_type_id'],
         'salary_range'=>$data['salary_range'],
         'address'=>$data['address'],
         'created_by'=>$user->id,
         'expiry_date'=>$data['expiry_date'],
         'years_of_experience'=>$data['years_of_experience']
       ]); 
       return redirect('jobs')->with(['message'=>'Job created.']); 
    }

    function addCertification(JbJob $job,JbJobCertification $jobCertification,Request $request){
      $data = $request->all(); 
      JbJobCertification::create([
        'jb_job_id'=>$job->id,
        'jb_certification_id'=>$data['jb_certification_id']
      ]);
      return redirect('jobs/' . $job->id . '#job-certification')->with(['message'=>'Certification Added.']);
    }

    function addSkill(JbJob $job,JbJobSkill $jobSkill,Request $request){
      $data = $request->all(); 
      JbJobSkill::create([
        'jb_job_id'=>$job->id,
        'jb_skill_id'=>$data['jb_skill_id']
      ]);
      return redirect('jobs/' . $job->id . '#job-skill')->with(['message'=>'Skill Added.']);      
    }

    function addCompetence(JbJob $job,JbJobCompetence $jobCompetence,Request $request){
      $data = $request->all(); 
      JbJobCompetence::create([
        'jb_job_id'=>$job->id,
        'jb_competence_id'=>$data['jb_competence_id']
      ]);
      return redirect('jobs/' . $job->id . '#job-competence')->with(['message'=>'Competence Added.']);      
    }

    function addRecruitmentType(JbJob $job,JbJobRecruitementType $jobRecruitmentType,Request $request){
       $data = $request->all();
       JbJobRecruitementType::create([
         'jb_job_id'=>$job->id,
         'jb_recruitment_type_id'=>$data['jb_recruitment_type_id']
       ]);
       return redirect('jobs/' . $job->id . '#job-recruitment')->with(['message'=>'Recruitment Level Added.']);;
    }

}
