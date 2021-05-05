<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbCompetence extends Model
{
    //
    protected $table = 'jb_competencies';

    protected $fillable = ['name','created_by'];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    
}
