<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/19/2020
 * Time: 9:25 AM
 */

namespace App\Packages;


interface ValuePort
{

	 function getCurrentJobId();
	 function getCurrentCandidateId();
	 function resolveRelation($model,$relation,$property);
	function resolveRelationArray($model,$relation,$property);

}