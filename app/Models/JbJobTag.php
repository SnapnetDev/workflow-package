<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbJobTag extends Model
{
    //

    protected $table = 'jb_job_tags';


    protected $fillable = ['jb_job_id','name'];

    function job(){
    	return $this->belongsTo(JbJob::class,'jb_job_id');
    }

}
