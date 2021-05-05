<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //


    protected $scrollTo = '#'; 

    function logError($route,$config=[],$message){
      if (!empty($config))$config[]  = $this->scrollTo; 
      // dd($config);
      return redirect()->route($route,$config)->with(['message'=>$message,'error'=>true]);
    }


    function logSuccess($route,$config=[],$message){
      $config[] = $this->scrollTo;
      // dd($config);
      return redirect()->route($route,$config)->with(['message'=>$message,'error'=>false]);
    }

}
