<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbJobCertification extends Model
{
    //
    protected $table = 'jb_job_certifications';

    protected $fillable = ['jb_job_id','jb_certification_id'];

    const UPDATED_AT = null;
    const CREATED_AT = null;
    

    function job(){
      return $this->belongsTo(JbJob::class,'jb_job_id');
    }

    function certification(){
    	return $this->belongsTo(JbCertification::class,'jb_certification_id');
    }
}
