<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbJob;
use App\Jb\JbJobCertification;
use App\Jb\JbJobSkill;
use App\Jb\JbJobCompetence;
use App\Jb\JbJobRecruitementType;




class JobDeleteController extends Controller
{
    //

    function deleteAction(JbJob $job){
       $job->delete();
       return redirect('jobs')->with(['message'=>'Job Removed.']);
    }

    
    function removeCertification(JbJobCertification $jobCertification){
     $jobCertification->delete();
     return redirect('jobs/' . $jobCertification->jb_job_id . '#job-certification')->with(['message'=>'Certification Removed.']);
    }

    function removeSkill(JbJobSkill $jobSkill){
      $jobSkill->delete();
      return redirect('jobs/' . $jobSkill->jb_job_id . '#job-skill')->with(['message'=>'Skill Removed.']);
    }


    function removeCompetence(JbJobCompetence $jobCompetence){
      $jobCompetence->delete();
      return redirect('jobs/' . $jobCompetence->jb_job_id . '#job-competence')->with(['message'=>'Competence Removed.']);
    }

    function removeRecruitmentType(JbJobRecruitementType $jobRecruitmentType){
       $jobRecruitmentType->delete();
      return redirect('jobs/' . $jobRecruitmentType->jb_job_id . '#job-recruitment')->with(['message'=>'Job Recruitment Removed.']);       
    }


}

