<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    //
    protected $table='job_levels';

    public function joblisting(){
    	return $this->hasMany('App\joblisting','level_id');
    }
}
