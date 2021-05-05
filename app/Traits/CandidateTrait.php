<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 6/16/2020
 * Time: 11:42 AM
 */

namespace App\Traits;


use App\JbFilter;
use App\Models\JbCandidate;
use App\Models\JbCandidateJob;
use Illuminate\Database\Eloquent\Builder;

trait CandidateTrait
{

	use RequestFilterTrait;

	function fetch($filters=[]):Builder{

		$filters = $this->getResolvedFilter($filters);

		$query = (new JbCandidate)->newQuery();

		if (isset($filters['job'])){
          $query = $query->whereHas('candidate_jobs',function(Builder $builder) use ($filters){
          	return $builder->where('jb_job_id',$filters['job']);
          });
		}

		if (isset($filters['id'])){
			$query = $query->where('id',$filters['id']);
		}
		
		if (isset($filters['filter'])){
		    $coll = JbFilter::find($filters['filter']);
		    $keywords = $coll->keywords;
//		    $query = $query->where('','like','%' . $keywords . '%');
		    $keywords = explode('_comma_', $keywords);
		    foreach ($keywords as $k=>$v){
		    	$query = $query->where('cv_string','like','%' . $v . '%');
		    }
		}

		if (isset($filters['folder_s'])){

			$folder_s = $filters['folder_s'];

			$query = $query->whereHas('candidate_folder',function(Builder $builder) use ($folder_s){

				return $builder->where('jb_folder_id',$folder_s);

			});

		}

//		if (isset($filters['prev'])){
//			$query = $query->where('id','<',$filters['prev']);
//		}
//
//		if (isset($filters['next'])){
//			$query = $query->where('id','>',$filters['next']);
//		}

		$query = $query->orderBy('id','desc');

		return $query;

	}





	function updateCandidateJobStatus($jb_jb_id,$status){
	   $candidateId = $this->id;
       $record = (new JbCandidateJob)->newQuery();
       $record = $record->where('jb_job_id',$jb_jb_id)->where('jb_candidate_id',$candidateId)->first();
       if (!is_null($record)){
       	 $record->status = $status;
       	 $record->save();
       }
	}

	function updateCandidateJobStatusCollection(){

		$candidateIds = request()->get('candidateIds');
		$status = request()->get('status');
		$jobId= request()->get('jobId');

		foreach ($candidateIds as $candidateId){
			$obj = JbCandidate::find($candidateId);
		    $obj->updateCandidateJobStatus($jobId,$status);
		}

		return [
			'message'=>'Applicants job status updated successfully',
			'error'=>false
		];

	}





}