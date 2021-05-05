<?php

namespace App\Http\Controllers\Certification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jb\JbCertification;

class CertificationDeleteController extends Controller
{
    //
    function deleteAction(JbCertification $certification){
      $certification->delete();
      return redirect('certifications')->with(['message'=>'Certification Removed.']);
    }
}
