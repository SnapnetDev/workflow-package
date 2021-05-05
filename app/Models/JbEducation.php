<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbEducation extends Model
{
    //
    protected $table = 'jb_educations';

    protected $fillable = ['name','created_by'];

    const UPDATED_AT = null;
    const CREATED_AT = null;


    function candidateEducations(){
    	return $this->hasMany(JbCandidateEducation::class,'jb_education_id');
    }

   
}
