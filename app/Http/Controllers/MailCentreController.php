<?php

namespace App\Http\Controllers;

use App\JbFilter;
use App\JbFolder;
use App\Models\JbCandidate;
use App\Models\JbJob;
use App\Traits\MailTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MailCentreController extends Controller
{
    //
	use MailTrait;

	function index(){

		$data = [];

		$data['filters'] = JbFilter::all();
		$data['jobRoles'] = JbJob::all();
		$data['folders'] = JbFolder::all();

		return view('mail_centre.index',$data);


	}

	function query($path){

		$query = (new JbCandidate)->newQuery();

		if ($path == 'applicant_by_role'){

			$applicant_by_role = request('id');

				$query = $query->whereHas('candidate_jobs',function(Builder $builder) use ($applicant_by_role){
					return $builder->where('jb_job_id',$applicant_by_role);
				});

//			return [
//				'list'=>$query->get()
//			];
		}



		if ($path == 'filter_keywords'){

			$id = request('id');
				$coll = JbFilter::find($id);
				$keywords = $coll->keywords;
				$keywords = explode('_comma_', $keywords);
				foreach ($keywords as $k=>$v){
					$query = $query->where('cv_string','like','%' . $v . '%');
				}


		}



		if ($path == 'filter_folder'){

			$folder_s = request('id');

			$query = $query->whereHas('candidate_folder',function(Builder $builder) use ($folder_s){
				return $builder->where('jb_folder_id',$folder_s);
			});


		}



		return [
			'list'=>$query->get()
		];

	}





	private function genCode($email){

		$query = (new JbCandidate)->newQuery();
		$query = $query->where('email',$email);
		$obj = $query->first();

		$salt = md5($obj->user_id);
		$salt = substr($salt, -5);

		return strtoupper('EMP' . $salt);

	}

	function sendCandidateMail(){
//		$this->applicants = $query->get('email');

		$tos = request('to');
		$subject = request('subject');
		$message = request('message');

		$tos = explode(',', $tos);

		$message = explode("\n", $message);
		$message = implode('<br />', $message);


		foreach ($tos as $to){

			$code = $this->genCode($to);


			$msg = '<h2>Applicant Code#: ' . $code . ' </h2><br /><hr />' . $message;

			$this->sendMail(function() use ($to,$subject,$msg){
				return [

					'to'=>$to,
					'subject'=>$subject,
					'message'=>$msg

				];
			});

		}


		return [
			'message'=>'All mail sent...'
		];


	}


}
