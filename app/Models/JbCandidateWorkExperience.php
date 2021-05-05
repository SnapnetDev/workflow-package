<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbCandidateWorkExperience extends Model
{
    //
    protected $table = 'jb_candidate_work_experience';

    protected $fillable = ['jb_candidate_id','company_name','company_role','role_description','work_from','work_to'];

    function candidate(){
    	return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
    }
}
