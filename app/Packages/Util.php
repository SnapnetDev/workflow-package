<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 01/03/2020
 * Time: 09:58
 */

namespace App\Packages;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Util
{

	public static function runCommand($obj,$command,Request $request){
		$method = Util::decodeCommand($command);
		if (method_exists($obj,$method)){
			$response = $obj->$method($request);
//            dd(0);
			if (isset($response['route'])) {
//            	dd($response);
				return redirect(route($response['route']))->with($response)->withInput();
			}else if ( isset($response['routeRaw']) ){
				return redirect($response['routeRaw'])->with($response)->withInput();
			}else if (isset($response['json'])){
//            	dd(1);
				return $response;
			}else{
//            	dd(2);
				return redirect()->back()->with($response)->withInput();
			}
		}

	}

    public static function decodeCommand($cmd){


        $r = explode('-',$cmd);
        $r  = array_map(function($v){
            return ucfirst($v);
        },$r);
        $rr = [];
        foreach ($r as $k=>$v){
           if ($k == 0){
               $rr[] = strtolower($v);
           }else{
               $rr[] = $v;
           }
        }

        return implode('',$rr);

    }

	public static function runRoute($obj,$command,Request $request){
		$method = Util::decodeCommand($command);
		if (method_exists($obj,$method)){
			$response = $obj->$method($request);
			return $response;
		}else{
			return '404';
		}

	}

    public static function onAuthRestrict($redirectRoute,$callback){

    	if (Auth::check()){
    		return redirect(route($redirectRoute));
	    }else{
    	    return $callback();
	    }

    }

}