<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 3/26/2020
 * Time: 11:53 AM
 */

namespace App\Traits;


use App\Models\JbCandidate;
use App\Models\JbCandidateJob;

trait CandidateJobNotificationTrait
{

//	use MailTrait{
//	  MailTrait::sendMail as sendMail_;
//	}


	function sendJobApplicationStatus(JbCandidateJob $jbCandidateJob,$status,callable  $callbackNotification){

		$candidate = JbCandidate::find($jbCandidateJob->jb_candidate_id);

		$client = [];
		$client['to'] = $candidate->email;
		$client['subject'] = 'Application Status';
		$client['message'] = 'Dear applicant , <br />
                                  Your application has just been <b>' . $this->humanize($status) . '</b>';

		$callbackNotification($client);

//		$this->sendMail_(function ($client) use ($candidate,$status){
//
//            $client['to'] = $candidate->email;
//            $client['subject'] = 'Application Status';
//            $client['message'] = 'Dear applicant , <br />c
//                                  Your application has just been ' . $status;
//
//			return $client;
//
//		});


	}

    function humanize($str){
    	$r = explode('_', $str);
    	$r = array_map(function ($vl) {
    		return ucfirst($vl);
	    }, $r);
    	return implode(' ', $r);
    }

}