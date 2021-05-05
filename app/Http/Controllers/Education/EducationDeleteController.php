<?php

namespace App\Http\Controllers\Education;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbEducation;

class EducationDeleteController extends Controller
{
    //
    function deleteAction(JbEducation $education){

    	$education->delete();

    	return redirect('educations')->with(['message'=>'Education Removed.']);

    }
}
