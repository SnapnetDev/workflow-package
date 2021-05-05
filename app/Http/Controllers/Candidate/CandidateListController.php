<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCandidate;
use App\User;
use App\Jb\JbRecruitmentType;
use App\Jb\JbEducation;
use App\Jb\JbSkill;
use App\Jb\JbCertification;
use App\Jb\JbCompetence;



class CandidateListController extends Controller
{
    //


     function index(User $user){
       
       return view('candidate.index',[
          'candidate'=>JbCandidate::myCv($user->id),
          'hasCv'=>$user->hasUploadedCv(),
          'jb_recruitment_type_ids'=>JbRecruitmentType::all(),
          'candidate'=>$user->candidates()->exists()? $user->candidates->first() : [],
          'educations'=>JbEducation::all(),
          'skills'=>JbSkill::all(),
          'certifications'=>JbCertification::all(),
          'jb_competency_ids'=>JbCompetence::all(),
          // 'candidateEducations'=>$user->candidate->candidateEducations,
          'user'=>$user
       ]);

     }

}
