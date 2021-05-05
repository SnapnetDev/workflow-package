<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JbFilterGroup extends Model
{
    //
    protected $table = 'jb_filter_groups';

    protected $fillable = [
        'user_id',
        'name',
        'comments'  
    ];


    function candidateFilterGroups(){
    	return $this->hasMany(JbCandidateFilterGroup::class,'jb_filter_group_id');
    }



    function runFilter($filters = []){
      // $obj = $this;
      $query = $this->candidateFilterGroups()->where('jb_filter_group_id',$this->id)->whereHas('candidate',function($innerQuery) use ($filters){
        $innerQuery = (new JbFilter)->applyAndGetFilterResult($innerQuery,$filters);        
      });
      // dd($query->toSql());
      return $query;
    }


}
