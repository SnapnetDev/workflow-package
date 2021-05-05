<?php

namespace App\Packages\Applicant;


use App\Models\JbCandidate;
use App\Models\JbCandidateFilterGroup;
use App\Models\JbCertification;
use App\Models\JbFilterGroup;
use App\Models\JbJob;
use App\Models\JbJobTag;
use App\Models\JbSkill;
use App\Packages\User\UserPort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantAdapter implements ApplicantPort{
    
    private $request = null;
    private $userPort = null;

    
    function __construct(Request $request,UserPort $userPort){
      $this->request = $request;  
      $this->userPort = $userPort;
    }
    
    

    public function saveFilterredSearch()
    {
      $candidate = new JbCandidate;  //::find($candidateId);
      $candidateFilterGroup = new JbCandidateFilterGroup;
      
      $response = [];
      
      try {
            
        $response['candidates'] = $candidate->runFilter($this->request->all())->paginate(7);
        
        $jb_filter_group_id = $this->request->jb_filter_group_id;
        $candidateFilterGroup->saveFilteredSearch($response['candidates'], $jb_filter_group_id);
//         $response['filters'] = $this->request->all();
        $response['message'] = 'Search Filter Saved';
        $response['error'] = false;  
      }catch (\Exception $ex){
        $response['message'] = $ex->getMessage();
        $response['error'] = true;
      }
      
      return $response;
      
    }

    public function getApplicantsByJob($jobId)
    {
        $job = JbJob::find($jobId);
        
        $response = [];
        
        try {
            
            $response['applicants'] = $job->runFilter($this->request->all());
            
//             dd($response);
            $response['applicants'] = $this->userPort->updateUserCollection($response['applicants']);
            
            $response['filters'] = $this->request->all();
            $response['filterGroups'] = JbFilterGroup::where('user_id',Auth::user()->id)->get(); 
            $response['error'] = false;
        }catch (\Exception $ex){
            $response['message'] = $ex->getMessage();
            $response['error'] = true;
        }
        
        return $response;
        
    }
    
    public function getMetricsByJob($jobId)
    {
        $job = JbJob::find($jobId);
        
        $response = [];
        
        $response['job'] = $job;
        $response['jobSkills'] = $job->jobSkills;
        $response['jobCertifications'] = $job->jobCertifications;
        $response['jobCompetencies'] = $job->jobCompetencies;
        $response['jobRecruitmentTypes'] = $job->jobRecruitmentTypes;
        $response['json'] = $this->request->all();
        $response['tags'] = JbJobTag::all();
//         $response['filterGroups'] = JbFilterGroup::where('user_id',Auth::user()->id)->get();
        
        return $response;
        
    }
    
    public function getApplicantsByPool()
    {
        $candidate = new JbCandidate;
        $response = [];
        
        $response['candidates'] = $candidate->runFilter($this->request->all())->paginate(7);
        
//         $response['applicants'] = $this->userPort->updateUserCollection($response['applicants']);
        
        $response['filterGroups'] = JbFilterGroup::where('user_id',Auth::user()->id)->get();
        
        $response['filters'] = $this->request->all();
        
        return $response;
        
    }

    public function getMetricsByPool()
    {
        $response = [];
        
        $response['jobSkills'] = JbSkill::all();
        
        $response['jobCertifications'] = JbCertification::all();
        
        $response['tags'] = JbJobTag::all();
        
        return $response;
    }


    function roleFetch()
    {
        // TODO: Implement roleFetch() method.
    }

    function roleCreate()
    {
        // TODO: Implement roleCreate() method.
    }

    function roleUpdate()
    {
        // TODO: Implement roleUpdate() method.
    }

    function permissionFetch()
    {
        // TODO: Implement permissionFetch() method.
    }

    function permissionCreate()
    {
        // TODO: Implement permissionCreate() method.
    }

    function permissionUpdate()
    {
        // TODO: Implement permissionUpdate() method.
    }

    function userAssignRole($userId)
    {
        // TODO: Implement userAssignRole() method.
    }

    function userGet($id)
    {
        // TODO: Implement userGet() method.
    }

}