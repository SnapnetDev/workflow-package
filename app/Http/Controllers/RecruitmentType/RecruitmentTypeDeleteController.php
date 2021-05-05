<?php

namespace App\Http\Controllers\RecruitmentType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jb\JbRecruitmentType;

class RecruitmentTypeDeleteController extends Controller
{
    //

    function deleteAction(JbRecruitmentType $recruitmentType){
      $recruitmentType->delete();
      return redirect('recruitment-types')->with(['message'=>'Recruitment Type Removed']);
    }

}
