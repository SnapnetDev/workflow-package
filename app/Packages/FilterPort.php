<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/20/2020
 * Time: 11:29 AM
 */

namespace App\Packages;


use App\JbFilter;
use App\Models\JbCandidateJob;

interface FilterPort
{

	 function applicantFilterByJob(JbCandidateJob $jbCandidateJob);
	 function applicantFilterByStoredPref(JbCandidateJob $jbCandidateJob,JbFilter $jbFilter);
	 function applySavedFilter(JbFilter $jbFilter);

	 function filterByOnboarded($query);
	 function filterByShortlisted($query);
	 function filterByCanceled($query);

	 function filterByMyCandidateId($query);



}