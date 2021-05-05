<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCandidateJob;
use App\Jb\JbJob;
use App\Jb\JbCandidate;
use App\Jb\JbSkill;


class JobApplicantsController extends Controller
{
    //

   
    private function getCommonData($job){
     return [
          'applicants'=>$job->candidates,
          'jobSkills'=>$job->jobSkills,
          'jobCertifications'=>$job->jobCertifications,
          'jobCompetencies'=>$job->jobCompetencies,
          'jobRecruitmentTypes'=>$job->jobRecruitmentTypes,
          'job'=>$job     
     ];  	
    }


    function viewApplicants(JbJob $job){
      return view('job_applicant.index',$this->getCommonData($job));
    }

    function viewApplicantsAjax(JbJob $job){
      $config = [];
      return view('job_applicant.ajax_partial',[
         'applicants'=>$job->runFilter($config) 
      ]); 
    }

    function viewApplicantDetail(JbCandidateJob $candidateJob){
      return view('job_applicant.detail',[
       'candidateJob'=>$candidateJob->candidate
      ]);
    }

    function approveApplicant(JbCandidateJob $candidateJob){
      $candidateJob->update([
        'approved'=>1
      ]);
      return  redirect('/view-applicants/' . $candidateJob->job->id)->with(['message'=>'Applicants approved.']);
    }


    function unapproveApplicant(JbCandidateJob $candidateJob){
      $candidateJob->update([
        'approved'=>0
      ]);
      return  redirect('/view-applicants/' . $candidateJob->job->id)->with(['message'=>'Applicants unapproved.']);
    }


    // function viewTalentPull(){
    //   return view( 'job_applicant.talent_pull',[
    //       'applicants'=>JbCandidate::all(),
    //       'jobSkills'=>,
    //       'jobCertifications'=>$job->jobCertifications,
    //       'jobCompetencies'=>$job->jobCompetencies,
    //       'jobRecruitmentTypes'=>$job->jobRecruitmentTypes,
    //       'job'=>$job     
    //   ]);
    // }



    function viewApplicantsAll(){
       
    }





}
