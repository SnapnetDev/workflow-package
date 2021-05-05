<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jb\JbCandidate;
use App\User;
use App\Jb\JbRecruitmentType;
use App\Jb\JbCandidateSkill;
use App\Jb\JbCandidateCertification;
use App\Jb\JbCompetence;
use App\Jb\JbCandidateEducation;

class CandidateCreateController extends Controller
{
    //
    function create(User $user){
      return view('candidate.create',[
         'user'=>$user,
         'jb_recruitment_type_ids'=>JbRecruitmentType::all(),
         'jb_competency_ids'=>JbCompetence::all()
      ]);
    }

    function createAction(User $user,JbCandidate $candidate,Request $request){
      $data = $request->all();
      JbCandidate::create([
        'user_id'=>$user->id,
        'name'=>$data['name'],
        'email'=>$data['email'],
        'phone_number'=>$data['phone_number'],
        'address'=>$data['address'],
        'date_of_birth'=>$data['date_of_birth'],
        'gender'=>$data['gender'],
        'marital_status'=>$data['marital_status'] ,
        'jb_recruitment_type_id'=>$data['jb_recruitment_type_id'],
        'jb_competency_id'=>$data['jb_competency_id'],
        'years_of_experience'=>$data['years_of_experience'],
        'referee1'=>$data['referee1'],
        'referee2'=>$data['referee2'],
        'referee3'=>$data['referee3'],
        'cover_letter'=>$data['cover_letter']
      ]);
      //jb_competency_id
      return redirect('/my-cv/' . $user->id)->with(['message'=>'CV uploaded successfully.']);
    }


    function addEducation(JbCandidate $candidate,JbCandidateEducation $candidateEducation,Request $request){
       
       //my-cv/178
       $data = $request->all();
       JbCandidateEducation::create([
         'jb_candidate_id'=>$candidate->id,
         'jb_education_id'=>$data['jb_education_id'],
         'date_from'=>$data['date_from'],
         'date_to'=>$data['date_to'],
         'qualifications'=>$data['qualifications']
       ]);

       return redirect('my-cv/' . $candidate->user->id . '#candidate-education')->with(['message'=>'Education Added.']);

    }


    function addSkill(JbCandidate $candidate,JbCandidateSkill $candidateSkill,Request $request){
      
      $data = $request->all();
       
       JbCandidateSkill::create([
         'jb_candidate_id'=>$candidate->id,
         'jb_skill_id'=>$data['jb_skill_id']
       ]);

       return redirect('my-cv/' . $candidate->user->id . '#candidate-skill')->with(['message'=>'Skill Added.']);

    }


    function addCertification(JbCandidate $candidate,JbCandidateCertification $candidateCertification,Request $request)
    {

      $data = $request->all();
       
       JbCandidateCertification::create([
         'jb_candidate_id'=>$candidate->id,
         'jb_certification_id'=>$data['jb_certification_id'],
         'date_certified'=>$data['date_certified']
       ]);

       return redirect('my-cv/' . $candidate->user->id . '#candidate-certification')->with(['message'=>'Certification Added.']);

    } 




}
