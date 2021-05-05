<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbJobCompetence extends Model
{
    //
    protected $table = 'jb_job_competencies';

    protected $fillable = ['jb_job_id','jb_competence_id'];

    const UPDATED_AT = null;
    const CREATED_AT = null;


    function job(){
    	return $this->belongsTo(JbJob::class,'jb_job_id');
    }

    function competence(){
    	return $this->belongsTo(JbCompetence::class,'jb_competence_id');
    }
    
}
