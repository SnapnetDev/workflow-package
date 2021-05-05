<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class joblisting extends Model
{
    //
    protected $table= 'available_jobs';

    protected $fillable= ['title', 'job_desc', 'required_exp', 'job_ref', 'min_sal', 'max_sal', 'min_exp', 'max_exp', 'level_id', 'type_id', 'location_id', 'spec_id', 'qualification', 'date_expire', 'created_by', 'status', 'created_at', 'updated_at', 'taketest', 'otherskill', 'dept_id'];

    public function worktype(){
    	return $this->belongsTo('App\WorkType','type_id')->withDefault();
    }
    public function joblevel(){
    	return $this->belongsTo('App\JobLevel','level_id')->withDefault();
    }
    public function jobappliedfor(){
    	return $this->hasMany('App\jobappliedfor','job_id');
    }
}
