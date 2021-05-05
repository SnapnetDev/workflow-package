<?php

namespace App\Http\Controllers\Education;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbEducation;
use App\User;

class EducationCreateController extends Controller
{
    //
    function create(User $user){

    	return view('education.create',[
             'user'=>$user
    	]);

    }

    function createAction(User $user,JbEducation $education,Request $request){

    	 $data = $request->all();

         JbEducation::create([
            'name'=>$data['name'],
            'created_by'=>$user->id
         ]);

         return redirect('educations')->with(['message'=>'Education Added.']); 

    }

}
