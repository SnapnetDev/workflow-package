<?php

namespace App\Http\Controllers\Certification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCertification;
use App\User;


class CertificationCreateController extends Controller
{
    
    //
    function create(User $user){
      return view('certification.create',[
         'user'=>$user
      ]);
    }

    function createAction(User $user,JbCertification $certification,Request $request){
      $data = $request->all();
      JbCertification::create([
       'name'=>$data['name'],
       'created_by'=>$user->id
      ]);
      return redirect('certifications')->with(['message'=>'Certification Added.']);
    }

}
