<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbJobSkill extends Model
{
    //
    protected $table = "jb_job_skills";

    protected $fillable = ['jb_job_id','jb_skill_id'];

    const UPDATED_AT = null;
    const CREATED_AT = null;


    function job(){
    	return $this->belongsTo(JbJob::class,'jb_job_id');
    }

    function skill(){
    	return $this->belongsTo(JbSkill::class,'jb_skill_id');
    }

}
