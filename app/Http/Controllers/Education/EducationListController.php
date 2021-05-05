<?php

namespace App\Http\Controllers\Education;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbEducation;

class EducationListController extends Controller
{
    //
    function index(JbEducation $education){
      return view('education.index',[
        'educations'=>$education::all()
      ]);
    }
}
