<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbCertification extends Model
{
    //
    protected $table = 'jb_certifications';

    protected $fillable = ['name','created_by'];

    const UPDATED_AT = null;
    const CREATED_AT = null;
    

    function candidate(){
    	return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
    }


}
