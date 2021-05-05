<?php

namespace App;

use App\Models\JbCandidate;
use Illuminate\Database\Eloquent\Model;

class JbCandidateFolder extends Model
{
    //
	protected $table = 'jb_candidate_folder';



	function candidate(){
		return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
	}

	function folder(){
		return $this->belongsTo(JbFolder::class,'jb_folder_id');
	}


}
