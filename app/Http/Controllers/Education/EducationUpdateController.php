<?php

namespace App\Http\Controllers\Education;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbEducation;

class EducationUpdateController extends Controller
{
    //
    function update(JbEducation $education){
    	return view('education.edit',[
           'education'=>$education
    	]);
    }

    function updateAction(JbEducation $education,Request $request){
      $data = $request->all();
      $education->update([
          'name'=>$data['name']
      ]);
      return redirect('educations')->with(['message'=>'Education Updated.']);
    }

}
