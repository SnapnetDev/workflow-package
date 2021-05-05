<?php



namespace App\Http\Controllers;



use App\Models\JbCandidateJob;

use App\Models\JbCertification;

use App\Models\JbEducation;

use App\Models\JbJob;



use App\Models\JbSkill;

use App\Packages\Crud\CrudService;

use App\Packages\Discipline\DisciplineAdapter;

use App\Packages\Job\JobSearchAdapter;

use App\Packages\Job\JobSearchService;

use App\Packages\Region\RegionAdapter;

use App\User;

use Auth;

use Illuminate\Http\Request;

use App\Packages\Discipline\DisciplinePort;

use App\Packages\Region\RegionPort;



class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        // $this->middleware('auth');

    }



    public function index(DisciplinePort $disciplinePort,RegionPort $regionPort)

    {



//         $regionService = new CrudService(new RegionAdapter($request));

//         $disciplineService = new CrudService(new DisciplineAdapter($request));



        return view('home', [

            'jobs' => JbJob::getActiveJobs(3),

            'region' =>  $regionPort->getList(),//$regionService->getList(),

            'discipline' => $disciplinePort->getList() //$disciplineService->getList()

        ]);

    }



    function getJobList(Request $request){

      $jobSearchService = new JobSearchService(new JobSearchAdapter($request));

      $response = $jobSearchService->filter();

      return view('job.job_partial',$response);

    }







    function indexTest()

    {

        return view('layouts.main');

    }





    function userDashboard(Request $request,RegionPort $regionPort,DisciplinePort $disciplinePort)

    {

        $applicantCount = 0;

        if (Auth::user()->whereHas('candidate',function($builder){ 
            return $builder->whereHas('candidateJobs',function($builder){ 
                return $builder;
            }); 
        })->exists()) {

            $applicantCount =  Auth::user()->candidate->candidateJobs->count();

        }





//         $crudService = new CrudService(new RegionAdapter($request));





        return view('user.dashboard', [

            'jobCount' => JbJob::count(),

            'applicantCount' => JbCandidateJob::count(),

            'jobAppliedCount' => $applicantCount,

            'userCount' => User::count(),

            'educationCount' => JbEducation::count(),

            'certificationCount' => JbCertification::count(),

            'skillCount' => JbSkill::count(),

            'region' =>$regionPort->getCount(), // $crudService->getCount(),

            'discipline' => $disciplinePort->getCount() //(new CrudService(new DisciplineAdapter($request)))->getCount()

        ]);

    }





    function jobDetail(JbJob $job)

    {

        return view('job.detail', [

            'job' => $job

        ]);

    }



    function jobApply(JbJob $job, JbCandidateJob $candidateJob, Request $request)

    {

        JbCandidateJob::create([

            'jb_job_id' => $job->id,

            'jb_candidate_id' => Auth::user()->candidate()->id,

            'approved' => 0

        ]);

        return redirect('/')->with(['message' => 'You have successfully applied for the role of a ' . $job->role]);

    }

}

