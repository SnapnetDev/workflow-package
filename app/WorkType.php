<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    //
    protected $table= 'job_levels';

    protected $fillable = ['work_type'];

    public function joblisting(){
    		return $this->hasMany('App\joblisting','type_id')->withDefault();
    }
}
