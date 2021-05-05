<?php

namespace App\Http\Controllers\Certification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCertification;

class CertificationListController extends Controller
{
    //
    function index(JbCertification $certification){
    	return view('certification.index',[
          'certifications'=>$certification::all()
    	]);
    }
}
