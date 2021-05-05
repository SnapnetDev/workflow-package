<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\BaseController;

use App\Models\JbCandidateJob;


class CandidateJobController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
         'jb_job_id'=>'required'
        ]);

        $data['jb_candidate_id'] = \Auth::user()->candidate->id;

        try {
            JbCandidateJob::create($data);      
            //$data['jb_job_id']    
            return $this->logSuccess('home.main',[],'You have successfully applied for this job.');
        } catch (Exception $e) {
            return $this->logError('home.main',[],$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JbCandidateJob $candidatejob)
    {
        //
        // return view('candidate_job.show',[
        //     'candidatejob'=>$candidatejob    
        // ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,JbCandidateJob $candidatejob)
    {
        //
        try {

            $data = request()->validate([
              'approved'=>'required'
            ]);

            if (isset($data['approved'])){
              if ($data['approved'] == 1){
                $message = 'Application approved';  
              }elseif ($data['approved'] == 0){
                $message = 'Application unapproved';  
              }
              $candidatejob->update($data);
              return $this->logSuccess('job.applicants',[$candidatejob->jb_job_id],$message);   //candidatejob
            }else{
              return $this->logError('job.applicants',[$candidatejob->jb_job_id],"Invalid request");                     
            }
        } catch (Exception $e) {
          return $this->logError('job.applicants',[$candidatejob->jb_job_id],$e->getMessage());            
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
