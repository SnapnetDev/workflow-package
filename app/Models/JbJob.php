<?php

namespace App\Models;

use App\JbDisciplines;
use App\Traits\JobTrait;
use Illuminate\Database\Eloquent\Model;

class JbJob extends Model
{
	use JobTrait;
    //
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = 'jb_jobs';
    protected $fillable = ['role','description','jb_recruitment_type_id','salary_start','salary_stop','address','created_by','expiry_date','years_of_experience'];

    static function getActiveJobs($rpp=4){
       $query = JbJob::whereDate('expiry_date','>',date('Y-m-d'));
       return $query->paginate($rpp);
    }

    function candidates(){
    	return $this->hasMany(JbCandidateJob::class,'jb_job_id');
    }

    function jobSkills(){
     return $this->hasMany(JbJobSkill::class,'jb_job_id');
    }

    function jobCertifications(){
      return $this->hasMany(JbJobCertification::class,'jb_job_id');
    }

    function jobCompetencies(){
    	return $this->hasMany(JbJobCompetence::class,'jb_job_id');
    }

    function jobRecruitmentTypes(){
    	return $this->hasMany(JbJobRecruitementType::class,'jb_job_id');
    }

    function jobTags(){
        return $this->hasMany(JbJobTag::class,'jb_job_id');
    }

    function discipline(){
        return $this->belongsTo(JbDisciplines::class,'discipline_id');
    }

    function formatSalaryRange(){

        // $r = $this->salary_range;
        // $r = explode('-', $r);
        // if (isset($r[1])){
        //   $r[1] = +$r[1];
        //   $this->salary_max = $r[1];
        // }else{
        //   $r[1] = 0;
        // }

        // $r[0] = +$r[0];

        // $this->salary_min = $r[0];
       if (is_numeric($this->salary_start) && is_numeric($this->salary_stop)){
         return number_format($this->salary_start * 1) . ' - ' . number_format($this->salary_stop * 1);
       }else{
         return ' 0 - 0 ';
       }


    }

    function hasCandidate($jb_candidate_id){

     $lst = $this->candidates;
     $found = false;

     foreach ($lst as $v){
        if ($v->jb_candidate_id == $jb_candidate_id){
          $found = true;
          break;
        }
     }

     return $found;

    }

    function runFilter($filters=[]){

      $query = (new JbCandidateJob)->where('jb_job_id',$this->id);


         $query = $query->whereHas('candidate',function ($innerQuery) use ($filters){

            $innerQuery = (new JbFilter)->applyAndGetFilterResult($innerQuery,$filters);

         });

      return $query->paginate(7);

    }





}
