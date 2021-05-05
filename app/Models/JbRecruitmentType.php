<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbRecruitmentType extends Model
{
    //
    protected $table = 'jb_recruitment_types';
    protected $fillable = ['name','created_by'];

    const UPDATED_AT = null;
    const CREATED_AT = null;
}
