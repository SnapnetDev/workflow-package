<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbJob;


class JobListController extends Controller
{
    //

    function index(JbJob $job){
      return view('job.index',[
        'jobs'=>$job::all()
      ]);
    }

}
