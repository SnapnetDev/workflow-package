<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Base\BaseController;
use App\Models\JbCertification;
use App\Models\JbCompetence;
use App\Models\JbJobRecruitementType;
use App\Models\JbJobTag;
use App\Models\JbRecruitmentType;
use App\Packages\Applicant\ApplicantPort;
use App\Packages\Discipline\DisciplinePort;
use App\Packages\Job\JobPort;
use App\Packages\Job\JobSearchAdapter;
use App\Packages\Job\JobSearchPort;
use App\Packages\Job\JobSearchService;
use App\Packages\Region\RegionPort;
use Illuminate\Http\Request;

// use App\Models\JbEducation;

// use Auth;

// use App\Models\JbJobSkill;
// use App\Models\JbJobCertification;


class JobController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $regionPort = null;
    private $disciplinePort = null;


    function __construct(DisciplinePort $disciplinePort,RegionPort $regionPort){

        $this->disciplinePort = $disciplinePort;
        $this->regionPort = $regionPort;

    }

    public function index(JobPort $jobPort)
    {
        $data = $jobPort->getList();
        $data = $this->getCommonData($data);
//        dd($data);
        return view('job.index', $data);
    }

    private function getCommonData($config = [])
    {

//         $regionService = new CrudService(new RegionAdapter(new Request));
//         $disciplineService = new CrudService(new DisciplineAdapter(new Request));

        $config['region'] = $this->regionPort->getList(); //  $regionService->getList();
        $config['discipline'] = $this->disciplinePort->getList(); //$disciplineService->getList();

        $config['jb_recruitment_type_ids'] = JbRecruitmentType::all();
        $config['certifications'] = JbCertification::all();
        // $config['skills'] = JbSkill::all();
        $config['competencies'] = JbCompetence::all();
        $config['recruitmentTypes'] = JbJobRecruitementType::all();
        $config['tags'] = JbJobTag::all();
        return $config;
    }


    public function create()
    {
        //
        return view('job.create', $this->getCommonData());
    }

    public function store(JobPort $jobPort)
    {
        //
//        $crudService = new CrudService(new JobAdapter($request));
        $response = $jobPort->create(); // $crudService->create();
        return redirect()->back()->with($response);
    }

    public function show($job, JobPort $jobPort,JobSearchPort $jobSearchPort)
    {

        $data = $jobSearchPort->skills($job);  //$jobPort->getItem($job);
        $jobData = $jobPort->getItem($job);

        session()->reflash();
        session()->put('jobId',$jobData['data']->id);
        session()->put('jobName',$jobData['data']->role); //  $job->role
	    session()->put('pageIntent','show');
        session()->save();

        return view('job.show',
            [
                'job' => $jobData['data'],
                'skills' => $data['list']
            ]
        );
    }

    function showApplicants($jobId, ApplicantPort $applicantPort)
    {
        $response = $applicantPort->getMetricsByJob($jobId);
        return view('job.applicants', $response);
    }

    function showApplicantsAjax($jobId , ApplicantPort $applicantPort)
    {
        $response = $applicantPort->getApplicantsByJob($jobId);
        return view('job_applicant.ajax_partial', $response);
    }



    function showApplicantsPool(ApplicantPort $applicantPort)
    {
        $data = $applicantPort->getMetricsByPool();
        return view('job.talent_pool', $data);
    }

    function showApplicantsPoolAjax(ApplicantPort $applicantPort)
    {
        $data = $applicantPort->getApplicantsByPool();
        return view('job.talent_pool_ajax_partial', $data);

    }


    function saveFilteredSearch(ApplicantPort $applicantPort)
    {

        return $applicantPort->saveFilterredSearch();
    }


    public function edit($job, Request $request , JobPort $jobPort, JobSearchPort $jobSearchPort)
    {
//        $crudService = new CrudService(new JobAdapter($request));
        $response = $jobPort->getItem($job);


        //


//        $jobSearchService = new JobSearchService(new JobSearchAdapter($request));

        $data = $jobSearchPort->skills($response['data']->id); //$jobSearchService->skills($response['data']->id);

        $response['skills'] = $data['list'];

        return view('job.edit', $this->getCommonData($response));

        // [
        //     'job'=>$job,
        //     'jb_recruitment_type_ids'=>\App\Models\JbRecruitmentType::all(),
        //     'certifications'=>JbCertification::all()
        // ]);
    }

    public function update(JobPort $jobPort)
    {

        $response = $jobPort->update();
        return redirect()->back()->with($response);

    }


    public function destroy(JobPort $jobPort)
    {
//        JbJob $job, Request $request ,
//        $crudService = new CrudService(new JobAdapter($request));
//        $response = $crudService->delete();
        $response = $jobPort->delete();
        return redirect()->back()->with($response);
    }


    function jobSkills(Request $request, $jobId)
    {

        $jobSearchService = new JobSearchService(new JobSearchAdapter($request));

        $data = $jobSearchService->skills($jobId);

        return view('job.job_skills', $data);
    }
}
