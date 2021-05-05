<?php

namespace App\Http\Controllers\Competence;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCompetence;
use App\User;

class CompetenceCreateController extends Controller
{
    //
    function create(User $user){
    	return view('competence.create',[
          'user'=>$user  
    	]);
    }

    function createAction(User $user,JbCompetence $competence,Request $request){
    	 $data = $request->all();
         
         JbCompetence::create([
           'name'=>$data['name'],
           'created_by'=>$user->id
         ]);

    	 return redirect('competencies')->with(['message'=>'Competence Created Successfully.']);

    }
}
