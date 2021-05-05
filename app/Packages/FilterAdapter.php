<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/20/2020
 * Time: 11:29 AM
 */

namespace App\Packages;


use App\JbFilter;
use App\Models\JbCandidate;
use App\Models\JbCandidateJob;
use Illuminate\Http\Request;

class FilterAdapter implements FilterPort
{

	private $request = null;
	private $valuePort = null;

	function __construct(Request $request,ValuePort $valuePort)
	{
	   $this->request = $request;
	   $this->valuePort = $valuePort;
	}

	function applicantFilterByJob(JbCandidateJob $jbCandidateJob)
	{
	   if ($this->request->filled('jobId')){
	   	$jbCandidateJob = $jbCandidateJob->where('jb_job_id',$this->request->jobId);
	   }
	   return $jbCandidateJob;
	}

	function applySavedFilter(JbFilter $jbFilter)
	{
		$query = new JbCandidate;

		if (!is_null($jbFilter)){

			$keywords = $jbFilter->keywords;
			$keywords = explode(',', $keywords);

			foreach ($keywords as $k=>$keyword){



			}

		}
	}

	function applicantFilterByStoredPref(JbCandidateJob $jbCandidateJob,JbFilter $jbFilter)
	{

		$keywords = $jbFilter->keywords;
		$keywords = explode('_comma_', $keywords);

		$jbCandidateJob = $jbCandidateJob->whereHas('candidate',function($query) use ($keywords){

			foreach ($keywords as $k=>$v){

			   if ($k == 0){
				   $query = $query->where('cv_string','like','%' . $v . '%')->orWhere('cover_letter','like','%' . $v . '%');
			   }else{
				   $query = $query->orWhere('cv_string','like','%' . $v . '%')->orWhere('cover_letter','like','%' . $v . '%');
			   }

			}

			return $query;

		});

		return $jbCandidateJob;

	}

	function filterByOnboarded($query)
	{
		return $query->where('status','onboarded_to_hcm');
	}

	function filterByShortlisted($query)
	{
		return $query->where('status','shortisted_for_interview');
	}

	function filterByCanceled($query)
	{
		return $query->where('status','canceled');
	}

	function filterByMyCandidateId($query)
	{

	  $candidateId = $this->valuePort->getCurrentCandidateId();
	  return $query->where('jb_candidate_id',$candidateId);

	}


}