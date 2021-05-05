<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbCandidateEducation extends Model
{
   
     protected $fillable = ['jb_candidate_id','jb_education_id','qualifications','date_from','date_to'];

     const UPDATED_AT = null;
     const CREATED_AT = null;

    //
    protected $table = 'jb_candidate_educations';

    function candidate(){
    	return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
    }

    function education(){
    	return $this->belongsTo(JbEducation::class,'jb_education_id');
    }


}
