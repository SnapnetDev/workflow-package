<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JbCandidateDocument extends Model
{
    //
    protected $table = 'jb_candidate_documents';



    function user(){

        return $this->belongsTo(User::class,'user_id');
        // return $this->public function user()
        // {
        //     return $this->belongsTo('App\User', 'foreign_key', 'other_key');
        // }
    }
}
