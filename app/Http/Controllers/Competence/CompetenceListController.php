<?php

namespace App\Http\Controllers\Competence;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCompetence;

class CompetenceListController extends Controller
{
    //

    function index(JbCompetence $competence){
      return view('competence.index',[
         'competencies'=>$competence::all()
      ]);
    }
}
