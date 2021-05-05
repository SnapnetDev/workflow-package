<?php

namespace App\Http\Controllers\RecruitmentType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbRecruitmentType;

class RecruitmentTypeListController extends Controller
{
    //

    function index(JbRecruitmentType $recruitmentType){
     return view('recruitment_type.index',[
         'recruitmentTypes'=>$recruitmentType::all()
     ]);
    }
}
