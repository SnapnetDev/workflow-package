<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/12/2020
 * Time: 1:20 PM
 */

namespace App\Packages;


use App\Models\JbCandidate;
use App\Models\JbJob;
use App\Traits\MailTrait;
use App\User;
use Illuminate\Support\Facades\Mail;

class NotificationAdapter implements NotificationPort
{

	use MailTrait;

	private $repoPort = null;


	function __construct(RepoPort $repoPort)
	{
		$this->repoPort = $repoPort;
	}

	function notifyAdmin($jobId,$candidateId,$userId)
    {

    	$collection = $this->repoPort->getActiveNotifications();

    	foreach ($collection['list'] as $k=>$v){
    		$user = User::find($v->user_id);
//    		dd($user);
		    $this->sendMail_($user,$jobId,$candidateId,$userId);
	    }

//        dd($collection);

    }

    function sendMail_($user,$jobId,$candidateId,$userId){

		$applicantUser = User::find($userId);
		$candidateObj = JbCandidate::find($candidateId);
		$jobObj = JbJob::find($jobId);

		$template = view('mail.job_notification',[
			'applicantUser'=>$applicantUser,
			'candidateObj'=>$candidateObj,
			'jobObj'=>$jobObj
		]);

		$this->sendMail(function() use ($user,$template){

			return [
				'to'=>$user->email, //'easymagic1@gmail.com'
				'subject'=>'Job Candidate Notification',
				'message'=>$template
			];

		});
    }

//    private function sendMail(User $user,$jobId,$candidateId,$userId){
//
//		try{
//
//			$this->
//
//
//			Mail::raw('Job requests has been made on your platform', function($message) use ($user){
//				$message->to($user->email);
//				$message->subject('Job Candidate Notification');
//			});
//		}catch (\Exception $ex){
//
//		}
//
//	    // Mail::raw('plain text message', function ($message) {
//	    //     $message->from('john@johndoe.com', 'John Doe');
//	    //     $message->sender('john@johndoe.com', 'John Doe');
//	    //     $message->to('john@johndoe.com', 'John Doe');
//	    //     $message->cc('john@johndoe.com', 'John Doe');
//	    //     $message->bcc('john@johndoe.com', 'John Doe');
//	    //     $message->replyTo('john@johndoe.com', 'John Doe');
//	    //     $message->subject('Subject');
//	    //     $message->priority(3);
//	    //     $message->attach('pathToFile');
//	    // });
//
//    }

	function notifyTest()
	{


		try{
			Mail::raw('A test mail.', function($message){
				$message->to('easymagic1@gmail.com');
				$message->subject('Job Candidate Notification');
			});
		}catch (\Exception $ex){

		}
	}
}