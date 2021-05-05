<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 6/19/2020
 * Time: 9:48 AM
 */

namespace App\Traits;


use App\Models\JbJob;

trait JobTrait
{


	function requiresVideo(){
      $query = (new JbJob)->newQuery();
      $id = $this->id;
      return $query->where('id',$id)->where('use_profile_video',1)->exists();
	}



}