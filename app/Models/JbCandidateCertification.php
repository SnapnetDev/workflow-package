<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbCandidateCertification extends Model
{
    //
    protected $table = 'jb_candidate_certifications';
    protected $fillable = ['jb_candidate_id','jb_certification_id','date_certified'];


    const UPDATED_AT = null; 
    const CREATED_AT = null;

    function candidate(){
    	return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
    }

    function certification(){
    	return $this->belongsTo(JbCertification::class,'jb_certification_id');
    }
}
