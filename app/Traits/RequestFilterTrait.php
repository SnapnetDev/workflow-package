<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 6/16/2020
 * Time: 11:45 AM
 */

namespace App\Traits;


trait RequestFilterTrait
{

	function getResolvedFilter($filter=[]){
		$req = request()->all();
		foreach ($filter as $key=>$filt){
			$req[$key] = $filt;
		}
		return $req;
	}

}