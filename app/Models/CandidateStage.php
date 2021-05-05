<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateStage extends Model
{
    use HasFactory;

    protected $with = ['candidate_job','stage'];

    function candidate_job(){

     return $this->belongsTo(JbCandidateJob::class,'candidate_job_id');
     //candidate
	 //job

    }

    function stage(){

      return $this->belongsTo(Stage::class,'stage_id');

    }


}
