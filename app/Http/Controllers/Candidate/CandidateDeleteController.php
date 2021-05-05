<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCandidateEducation;
use App\Jb\JbCandidateSkill;
use App\Jb\JbCandidateCertification;




class CandidateDeleteController extends Controller
{
    //

    function removeEducation(JbCandidateEducation $candidateEducation,Request $request){
       
       //my-cv/178
       $candidateEducation->delete();

       return redirect('my-cv/' . $candidateEducation->candidate->user->id . '#candidate-education')->with(['message'=>'Education Removed.']);

    } 


    function removeSkill(JbCandidateSkill $candidateSkill){

       $candidateSkill->delete();

       return redirect('my-cv/' . $candidateSkill->candidate->user->id . '#candidate-skill')->with(['message'=>'Skill Removed.']);


    }


    function removeCertification(JbCandidateCertification $candidateCertification){

    	 $candidateCertification->delete();

       return redirect('my-cv/' . $candidateCertification->candidate->user->id . '#candidate-certification')->with(['message'=>'Certification Removed.']);


    }





}
