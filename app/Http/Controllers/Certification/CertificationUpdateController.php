<?php

namespace App\Http\Controllers\Certification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCertification;

class CertificationUpdateController extends Controller
{
    //

    function update(JbCertification $certification){
     return view('certification.edit',[
       'certification'=>$certification
     ]);
    }

    function updateAction(JbCertification $certification,Request $request){
     $data = $request->all();
     $certification->update([
         'name'=>$data['name']
     ]);
     return redirect('certifications')->with(['message'=>'Certification Updated.']);
    }
    
}
