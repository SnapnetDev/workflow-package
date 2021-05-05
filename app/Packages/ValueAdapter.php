<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/19/2020
 * Time: 9:26 AM
 */

namespace App\Packages;

use App\Models\JbCandidate;
use Auth;

class ValueAdapter implements ValuePort
{


	function getCurrentJobId()
	{
		if (session()->has('jobId')){
			return session()->get('jobId');
		}else{
			return null;
		}
	}


	function getCurrentCandidateId()
	{
	  $userId = Auth::user()->id;
	  $model = JbCandidate::where('user_id',$userId)->first();
	  if (!is_null($model)){
	  	return $model->id;
	  }else{
	  	return null;
	  }
	}

	function resolveRelation($model, $relation, $property)
	{
		$check = $model->$relation;
//		dd($check);
		if (is_null($check)){
            return '';
		}else{
			return $check->$property;
		}
	}


	function resolveRelationArray($model, $relation, $property)
	{
		$check = $model->$relation;
		if (is_null($check)){
			return [];
		}else{
			return $check->$property;
		}
	}


}