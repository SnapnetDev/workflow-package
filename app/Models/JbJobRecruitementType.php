<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbJobRecruitementType extends Model
{
    //
    protected $table = 'jb_job_recruitment_types';

    protected $fillable = ['jb_job_id','jb_recruitment_type_id'];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    function job(){
    	return $this->belongsTo(JbJob::class,'jb_job_id');
    }

    function recruitmentType(){
    	return $this->belongsTo(JbRecruitmentType::class,'jb_recruitment_type_id');
    }
    
}
