<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



use App\Models\JbFilter;

class JbCandidateFilterGroup extends Model
{
    //
    protected $table = 'jb_candidate_filter_groups';

    protected $fillable = [
         'jb_filter_group_id',
         'jb_candidate_id',
         'comments'
    ];


    function filterGroup(){
     return $this->belongsTo(JbFilterGroup::class,'jb_filter_group_id');
    }

    function saveFilteredSearch($candidates,$jb_filter_group_id){
       
       foreach ($candidates as $k=>$candidate){
       	
       	if (!self::hasDuplicate($jb_filter_group_id,$candidate->id)){
          $data = [
           'jb_candidate_id'=>$candidate->id,
           'jb_filter_group_id'=>$jb_filter_group_id,
           'comments'=>'...'
          ];
          self::create($data);
       	}

       }

    }
    


    static function hasDuplicate($jb_filter_group_id,$jb_candidate_id){
      return (self::where('jb_filter_group_id',$jb_filter_group_id)->where('jb_candidate_id',$jb_candidate_id)->count() > 0);
    }


    function candidate(){
      return $this->belongsTo(JbCandidate::class,'jb_candidate_id');
    }

    // function runFilter($filters = []){

    //   $query = $this->where('jb_filter_group_id',$this->id)->whereHas('candidate',function($innerQuery){
         
    //         $innerQuery = (new JbFilter)->applyAndGetFilterResult($this,$filters);

    //   });

    //   return $query;

    // }

    

}
