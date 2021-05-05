<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\JbJobCertification;

use App\Http\Controllers\Base\BaseController;

class JobCertificationController extends BaseController
{

    protected $scrollTo = '#job-certification';
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
        $data = $request->all();
        
        try {

           JbJobCertification::create([
             'jb_job_id'=>$data['jb_job_id'],
             'jb_certification_id'=>$data['jb_certification_id']
           ]);



           return $this->logSuccess('job.edit',[$data['jb_job_id']],'Certificate Requirement Added.');

        } catch (Exception $e) {
           // dd($e); 
           return $this->logError('job.edit',[$data['jb_job_id']],$e->getMessage()); 

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JbJobCertification $id)
    {
        //
        // return view('job_certification');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    

    public function destroy(JbJobCertification $jobcertification)
    {
        //
        try {
         
             $jobcertification->delete();

             return $this->logSuccess('job.edit',[$jobcertification->job->id],'Job Certification Removed');

        } catch (Exception $e) {

            return $this->logError('job.edit',[$jobcertification->job->id],$e->getMessage());

            
        }

    }


}
