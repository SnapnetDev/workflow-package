<?php

namespace App\Models;

use App\JbDisciplines;
use Illuminate\Database\Eloquent\Model;

class JbSkill extends Model
{
    //
    protected $table = 'jb_skills';

    protected $fillable = ['name','created_by'];

    const UPDATED_AT = null;
    const CREATED_AT = null;


    function candidateSkills(){
    	return $this->hasMany(JbCandidateSkill::class,'jb_skill_id');
    }


    function jobSkills(){
    	return $this->hasMany(JbJobSkill::class,'jb_skill_id');
    }

    function discipline(){
        return $this->belongsTo(JbDisciplines::class,'jb_discipline_id');
    }



}
