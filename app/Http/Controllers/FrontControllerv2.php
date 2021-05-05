<?php



namespace App\Http\Controllers;



use App\Interactors\CandidateFolderInteractor;

use App\JbFilter;

use App\JbFolder;

use App\JbSetting;

use App\Models\JbCandidate;

use App\Models\JbJob;

use App\Traits\CommandTrait;



class FrontControllerv2 extends Controller

{

    //

	use CommandTrait;





	function test4(){

		return 'Test4.';

	}



	function hcmAutoLogin(){

		$redirectResponse = (new JbCandidate)->autoLoginToHcRecruit();

		return $redirectResponse;

	}





	function pushToHcm(){

		//read payload info

//		return request()->all();

	}



	function getApplicants(){



		$data = [];



		$data['job'] = '';

		$data['filter'] = '';

		if (request()->filled('job')){

		  $data['job'] = request('job');

		}



		if (!empty($data['job'])){

		    if (!(new JbJob)->newQuery()->where('id',$data['job'])->exists()){

		    	return redirect()->back()->with([

		    		'message'=>'Invalid URL!',

				    'error'=>true

			    ]);

		    }else{

		      $data['jobObject'] = JbJob::find($data['job']);

		    }

		}else{

//			$data['jobObject'] = [];

		}



		if (request()->filled('filter')){

		  $data['filter'] = request('filter');

		}



		if (!empty($data['job'])){

			$data['queryString'] = '?job=' . $data['job'];

		}



		$js = [];

		$js['filter'] = $data['filter'];

		$js['job'] = $data['job'];



		$data['queryStringJs'] = $js;



		//http://127.0.0.1:8003/api/

		

		$data['hcm_base_endpoint'] = (new JbSetting)->getSetting('hcm_onboard_endpoint');

		$data['hcm_key'] = (new JbSetting)->getSetting('hcm_token');



		$data['emp_num'] = time();



        if (request()->filled('export')){

        	$array = (new JbCandidate)->fetch([])->get(['user_id','name','email','phone_number','address','age','gender','marital_status','created_at'])->toArray();

        	foreach ($array as $k=>$v){
        		
        		$salt = md5($v['user_id']);
        		$salt = substr($salt, -5);

        		$array[$k]['user_id'] = strtoupper('EMP' . $salt);

        	}

        	// dd($array);
    
          $this->downloadSendHeaders("data_export_" . date("Y-m-d") . ".csv");
          echo $this->array2Csv($array);
          return;
          // die();        

        }


		$data['candidates'] = (new JbCandidate)->fetch([])->paginate(20);

//		$data['candidateCount'] = (new JbCandidate)->fetch([])->count();

		$data['candidate'] = (new JbCandidate)->fetch([])->first();



		$data['roles'] = JbJob::all();

		$data['filters'] = JbFilter::all();



		$data['folder_s'] = '';

		$data['folder_s_obj'] = '';

		if (request()->filled('folder_s')){

			$data['folder_s'] = request('folder_s');

			$data['folder_s_obj'] = JbFolder::find($data['folder_s']);

		}



		$data['folders'] = (new CandidateFolderInteractor)->fetchFolders();



//		dd($data);

        return view('applicants.fetch',$data);

//		return view('candidate_job.fetch',$data);



	}


	function array2Csv(array &$array){
	   if (count($array) == 0) {
	     return null;
	   }
	   ob_start();
	   $df = fopen("php://output", 'w');
	   fputcsv($df, array_keys(reset($array)));
	   foreach ($array as $row) {
	      fputcsv($df, $row);
	   }
	   fclose($df);
	   return ob_get_clean();
	}

	function downloadSendHeaders($filename) {
	    // disable caching
	    $now = gmdate("D, d M Y H:i:s");
	    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
	    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
	    header("Last-Modified: {$now} GMT");

	    // force download  
	    header("Content-Type: application/force-download");
	    header("Content-Type: application/octet-stream");
	    header("Content-Type: application/download");

	    // disposition / encoding on response body
	    header("Content-Disposition: attachment;filename={$filename}");
	    header("Content-Transfer-Encoding: binary");
	}




	function getCandidateView(){



		$data = [];

		$data['candidate'] = (new JbCandidate)->fetch([

			'id'=>request('cid')

		])->first();



		return view('applicants.candidate_profile_inner',$data);



	}





}

