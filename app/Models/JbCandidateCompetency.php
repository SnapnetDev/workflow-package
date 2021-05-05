<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbCandidateCompetency extends Model
{
    //
    protected $table = 'jb_candidate_compentencies';

    function candidate(){
    	return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
    }

    function compentency(){
    	return $this->belongsTo(JbCompetency::class,'jb_compitency_id');
    }


}
