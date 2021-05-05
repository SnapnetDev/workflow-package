<?php

namespace App\Http\Controllers\Competence;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCompetence;


class CompetenceUpdateController extends Controller
{
    //
    function update(JbCompetence $competence){
      return view('competence.edit',[
       'competence'=>$competence
      ]);
    }

    function updateAction(JbCompetence $competence,Request $request){
      $data = $request->all();
      $competence->update([
       'name'=>$data['name']
      ]);
      return redirect('competencies')->with(['message'=>'Competence Added']);
    }
}
