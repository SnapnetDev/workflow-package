<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jb\JbCandidate;
use App\User;

class CandidateUpdateController extends Controller
{
    //

    function update(User $user,JbCandidate $candidate){
      return view('candidate.update',[
        'candidate'=>$candidate,
        'user'=>$user
      ]);
    }

    ///my-cv/{user}/{candidate}
    function updateCv(User $user,JbCandidate $candidate,Request $request){
    
      $data = $request->all();
    
      $candidate->update([
        // 'user_id'=>$user->id,
        'name'=>$data['name'],
        'email'=>$data['email'],
        'phone_number'=>$data['phone_number'],
        'address'=>$data['address'],
        'date_of_birth'=>$data['date_of_birth'],
        'gender'=>$data['gender'],
        'marital_status'=>$data['marital_status'],
        'jb_recruitment_type_id'=>$data['jb_recruitment_type_id'],
        'jb_competency_id'=>$data['jb_competency_id'],
        'years_of_experience'=>$data['years_of_experience'],
        'referee1'=>$data['referee1'],
        'referee2'=>$data['referee2'],
        'referee3'=>$data['referee3'],
        'cover_letter'=>$data['cover_letter']        
      ]);

      return redirect('/my-cv/' . $user->id)->with(['message'=>'CV update successfully.']);

    }


}
