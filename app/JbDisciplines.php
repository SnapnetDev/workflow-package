<?php

namespace App;

use App\Models\JbSkill;
use Illuminate\Database\Eloquent\Model;

class JbDisciplines extends Model
{
    //
    protected $table = 'jb_disciplines';


    function skills(){
        return $this->hasMany(JbSkill::class,'jb_discipline_id');
    }
}
