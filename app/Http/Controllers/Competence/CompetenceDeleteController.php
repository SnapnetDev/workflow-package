<?php

namespace App\Http\Controllers\Competence;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCompetence;

class CompetenceDeleteController extends Controller
{
    //
    function deleteAction(JbCompetence $competence){

    	 $competence->delete();

    	 return redirect('competencies')->with(['message'=>'Competence removed.']);

    }
}
