<?php

namespace App\Http\Controllers;

use App\Interactors\CandidateFolderInteractor;
use App\Models\JbJob;
use App\Packages\Application\ApplicationPort;
use App\Packages\BooleanPort;
use App\Packages\FilterPort;
use App\Packages\NotificationPort;
use App\Packages\RepoPort;
use App\Packages\Util;
use App\Packages\ValuePort;
use App\User;
use Auth;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    private $applicationPort = null;
    private $booleanPort = null;
    private $valuePort = null;
    private $notificationPort = null;
    private $repoPort = null;
    private $filterPort = null;

    function __construct(ApplicationPort $applicationPort,BooleanPort $booleanPort,ValuePort $valuePort,NotificationPort $notificationPort,RepoPort $repoPort,FilterPort $filterPort)
    {
        $this->applicationPort = $applicationPort;
        $this->booleanPort = $booleanPort;
        $this->valuePort = $valuePort;
        $this->notificationPort = $notificationPort;
        $this->repoPort = $repoPort;
        $this->filterPort = $filterPort;
    }


    function processGet(Request $request,$type){

        if ($type == 'fetch-users'){
            return $this->fetchUsers();
        }else if ($type == 'fetch-candidates'){
            return $this->fetchCandidates();
        }else if ($type == 'fetch-roles'){
            return $this->fetchRoles();
        }else if ($type == 'fetch-permissions') {
	        return $this->fetchPermissions();
        }else if ($type == 'candidate-create') {
	        return $this->candidateCreate();
        }else if ($type == 'candidate-update') {
	        return $this->candidateUpdate($request->id);
        }else if ($type == 'preview-candidate') {
	        return $this->previewCandidate($request->id);
        }else if ($type == 'test-mail') {
	        return $this->notificationPort->notifyTest();
        }else if ($type == 'applicants') {
	        return $this->fetchCandidateJob();
        }else if ($type == 'get-settings') {
	        return $this->fetchSettings();
        }else if ($type == 'get-filters') {
	        return $this->fetchFilters();

        }else{

//        	return Util::runCommand($this, $type, $request);
        	return Util::runRoute($this, $type, $request);
//            return '.404.';
        }

    }

    function fetchUsers(){
      $data = $this->applicationPort->userFetch();
      $data['type'] = 'Administrators';
      $data['roles'] = $this->applicationPort->roleFetch();
      $data['email'] = '';
      if (request()->filled('email')){
      	$data['email'] = request('email');
      }
      return view('user_new.index',$data);
    }

    function fetchCandidates(){
      $data = [];
//      $data = $this->applicationPort->candidateFetch();
      $data['type'] = 'Candidates';
      $data['list'] = (new User)->fetch([])->paginate(20);
      $data['roles'] = $this->applicationPort->roleFetch();
      $data['email'] = '';
      if (request()->filled('email')){
      	$data['email'] = request('email');
      }
      return view('user_new.index',$data);
    }

    function fetchRoles(){
      $data = $this->applicationPort->roleFetch();
      $data['permission'] = $this->applicationPort->permissionFetch();
      return view('role.index',$data);
    }


    function fetchPermissions(){
       $data = $this->applicationPort->permissionFetch();
      return  view('permission.index',$data);
    }





    /////Candidate section

	function candidateCreate(){

      $userId = Auth::user()->id;
      if ($this->booleanPort->hasCv($userId)){
      	$candidateId = $this->valuePort->getCurrentCandidateId();
	      $data = $this->applicationPort->disciplineFetch();
//	      return view('candidate.create',$data);

      	return redirect(route('app.get',['candidate-update']) . '?id=' . $candidateId);
      }else{
	      $data = $this->applicationPort->disciplineFetch();
	      $jobId = session()->get('jobId');
//	      $data['requires_video'] = JbJob::find($jobId)->requiresVideo();
	      $data['requires_video'] = false;
	      if (session()->has('jobId')){
		      $jobId = session()->get('jobId');
		      $data['requires_video'] = JbJob::find($jobId)->requiresVideo();
	      }

	      return view('candidate.create',$data);
      }

	}

	function candidateUpdate($id){
      $data = $this->applicationPort->candidateGet($id);
	  $r = $this->applicationPort->disciplineFetch();
      $data['discipline'] = $r['list'];
      $r = $this->applicationPort->documentFetch();
      $data['document'] = $r;
      $candidateId = $id;
      $r = $this->repoPort->candidateEducationFetch($candidateId);
      $data['education'] = $r;
      $r = $this->repoPort->candidateSkillFetch($candidateId);
      $data['skill'] = $r;
      $r = $this->repoPort->candidateWorkExperienceFetch($candidateId);
      $data['work_experience'] = $r;
//		jobId
		$data['requires_video'] = false;
		if (session()->has('jobId')){
			$jobId = session()->get('jobId');
			$data['requires_video'] = JbJob::find($jobId)->requiresVideo();
		}
//      dd($data);
      return view('candidate.edit',$data);
	}

	function previewCandidate($id){

	  $data = $this->applicationPort->candidateGet($id);
	  session()->reflash();
	  session()->put('pageIntent','preview');
	  session()->save();
      return view('candidate.preview',$data);
	}

	function fetchCandidateJob(){
    	$data = $this->applicationPort->candidateJobFetch();
    	$data['jobs'] = $this->repoPort->jobFetchValid();
    	$data['filters'] = $this->repoPort->filterFetch();
//    	dd($data);
    	return view('candidate_job.fetch',$data);
	}

	function fetchSettings(){
      $data = $this->repoPort->settingsFetch();
      return view('settings.index',$data);
	}

	function fetchFilters(){
    	$data = $this->repoPort->filterFetch();
    	return view('filters.index',$data);
	}

	function submitJobApplication(){

	}


	function testCreateCandidate(){
		$data = $this->applicationPort->disciplineFetch();
		return view('candidate.create',$data);
	}


	function myApplications(){

    	$data = [];
    	$filterPort = $this->filterPort;
    	//candidate.applied_jobs
    	$data['candidateJobs'] = $this->repoPort->candidateJobFetchAll(function($query) use ($filterPort){
    		return $filterPort->filterByMyCandidateId($query);
	    });
    	$data['candidateJobs'] = $data['candidateJobs']['list'];

    	return view('candidate.applied_jobs',$data);

	}


	function globalFolders(){
//    	dd(123);
    	$data = [];
    	$data['list'] = (new CandidateFolderInteractor)->fetchFolders();

    	return view('folders.index',$data);
	}






}
