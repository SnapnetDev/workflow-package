<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JbFolder extends Model
{
    //
	protected $table = 'jb_folder';



	function candidate_folders(){

		 return $this->hasMany(JbCandidateFolder::class,'jb_folder_id');

	}

}
