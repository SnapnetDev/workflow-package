<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbCandidateSkill extends Model
{
    //
     protected $table = 'jb_candidate_skills';

     protected $fillable = ['jb_candidate_id','jb_skill_id'];

     const UPDATED_AT = null;
     const CREATED_AT = null;



    function candidate(){
    	return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
    }

    function skill(){
    	return $this->belongsTo(JbSkill::class,'jb_skill_id');
    }


}
