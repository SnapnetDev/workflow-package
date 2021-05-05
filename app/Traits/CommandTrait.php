<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 6/10/2020
 * Time: 1:52 PM
 */

namespace App\Traits;


trait CommandTrait
{

	function execCommand($cmd){
		$cmd = strtolower($cmd);
		$r = explode('-', $cmd);
		$r = array_map(function($v){
			return ucfirst($v);
		}, $r);
		if (isset($r[0])){
			$r[0] = strtolower($r[0]);
		}
		$method = implode('', $r);

		if (method_exists($this, $method)){
			return call_user_func_array([
				$this,$method
			], []);
		}else{
			return 'N/A';
		}
	}
}