<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;

use App\Models\JbCandidate;
use App\Models\JbCertification;
use App\Models\JbCompetence;
use App\Models\JbEducation;
use App\Models\JbRecruitmentType;
use App\Models\JbSkill;
use App\Packages\Candidate\CandidateAdapter;
use App\Packages\Candidate\CandidateService;
use App\Packages\Crud\CrudService;
use App\Packages\Discipline\DisciplineAdapter;
use App\Packages\Job\JobSearchAdapter;
use App\Packages\Job\JobSearchService;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser as SmalotParser;
use App\Packages\CandidateDocument\CandidateDocumentPort;
use App\Packages\Candidate\CandidatePort;
use App\Packages\Discipline\DisciplinePort;

class CandidateController extends BaseController
{

    public function index()
    {
        //
    }

    private function getCommonData($config = [])
    {
        $config['jb_recruitment_type_ids'] = JbRecruitmentType::all();
        $config['jb_competency_ids'] = JbCompetence::all();
        $config['educations'] = JbEducation::all();
        // $config['skills'] = JbSkill::all();
        $config['certifications'] = JbCertification::all();
        return $config;
    }

    public function create(Request $request,CandidateDocumentPort $candidateDocumentPort, DisciplinePort $disciplinePort)
    {
        //
        // if ($request->has('jobId')){
        //   session()->put('jobId',$request->jobId);
        //   session()->save();
        // }else{
        //   return redirect(route('home.main'));
        // }
        //$crudService = new CrudService(new DisciplineAdapter($request));
        $data = $disciplinePort->getList(); // $crudService->getList();
        $data['documents'] = $candidateDocumentPort->getList();
        return view('candidate.create', $this->getCommonData($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CandidatePort $candidatePort)
    {
        //

        //$candidateService = new CandidateService(new CandidateAdapter($request));
        $response = $candidatePort->create(); // $candidateService->create();
        return redirect(route('candidate.edit', [$response['data']->id]))->with($response)->withInput();
    }

    public function show($candidate,CandidatePort $candidatePort)
    {
        //
//         $candidateService = new CandidateService(new CandidateAdapter($request));
//         $data = $candidateService->getItem($candidate);
//         $data3 = $candidateService->skills($data['data']->id);
//         $data['skills'] = $data3['list'];
//         $data['documents'] = $candidateDocumentPort->getList();
        
//         dd($data);

        $data = $candidatePort->getProfile($candidate);

        return view('candidate.show', $data);
    }

    //jobs related to a candidate scoped to the logged user
    function candidateAppliedJobs(JbCandidate $candidate)
    {

        return view('candidate.applied_jobs', [
            'candidateJobs' => $candidate->candidateJobs()->paginate(7)
        ]);
    }

    public function edit($candidate,DisciplinePort $disciplinePort, Request $request,
        CandidateDocumentPort $candidateDocumentPort,CandidatePort $candidatePort)
    {
        // dd($smalotParser);
//         $candidateService = new CandidateService(new CandidateAdapter($request));
        $data = $candidatePort->getItem($candidate); //$candidateService->getItem($candidate);

//         $crudService = new CrudService(new DisciplineAdapter($request));
        $data2 = $disciplinePort->getList(); // $crudService->getList();

        // $jobSearchService = new JobSearchService(new JobSearchAdapter($request));
        $data3 = $candidatePort->skills($data['data']->id); // $candidateService->skills($data['data']->id);
//         $data['documents'] = $candidateDocumentPort->getList();
        // $data3 = $jobSearchService->skills();


        // dd($data2);
        
    

        return view('candidate.edit', $this->getCommonData([
        
            'candidate' => $data['data'],
            'discipline' => $data2['list'],
            'skills' => $data3['list'],
            'documents'=>$candidateDocumentPort->getList()
            
        ]));
        
    }

    public function update(Request $request, CandidatePort $candidatePort)
    {
        //, JbCandidate $candidate,SmalotParser $smalotParser
//         $candidateService = new CandidateService(new CandidateAdapter($request));
        $response = $candidatePort->update(); //  $candidateService->update();
        return redirect(route('candidate.edit', [$response['data']->id]))->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JbCandidate $candidate)
    {
        //
        // try {
        //     //
        //     return $this->logSuccess('candidate.index',[],'Candidate Removed');
        // } catch (Exception $e) {
        //     return $this->logError('candidate.index',[],$e->getMessage());
        // }
        return redirect()->back();
    }
    
    
    
    //document management 
    
    function uploadDocument(CandidateDocumentPort $candidateDocumentPort){
      $response = $candidateDocumentPort->create();
      return redirect()->back()->with($response);
    }
    
    
    function changeDocument(CandidateDocumentPort $candidateDocumentPort){
      $response = $candidateDocumentPort->update();
      return redirect()->back()->with($response);
    }
   
    
    function removeDocument(CandidateDocumentPort $candidateDocumentPort){
      $response = $candidateDocumentPort->delete();
      return redirect()->back()->with($response);
    }
    
   
    
}
