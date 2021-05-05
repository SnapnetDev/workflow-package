<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbCandidateJob extends Model
{
    //
    protected $table = 'jb_candidate_jobs';

    protected $fillable = ['jb_candidate_id','jb_job_id','approved'];

    protected $with = ['job','candidate'];

    const CREATED_AT = null;
    const UPDATED_AT = null;
    

    function job(){
    	return $this->belongsTo(JbJob::class,'jb_job_id');
    }

    function candidate(){
    	return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
    }


    static function hasApplication($jb_candidate_id){
      // return JbCandidateJob::where('jb_candidate_id',$jb_candidate_id)->where('jb_job_id',)->;
    }

    function approvedFormat(){
        if ($this->approved == 0){
            return 'Not-Approved';
        }else{
            return 'Approved';
        }
    }


}
