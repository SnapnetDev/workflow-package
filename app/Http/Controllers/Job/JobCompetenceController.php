<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\BaseController;

use App\Models\JbJobCompetence;



class JobCompetenceController extends BaseController
{

    protected $scrollTo = '#job-competence';
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
            
           JbJobCompetence::create([
            'jb_job_id'=>$data['jb_job_id'],
            'jb_competence_id'=>$data['jb_competence_id']              
           ]);  

            return $this->logSuccess('job.edit',[$data['jb_job_id']],'Job Competence Added.');

        } catch (Exception $e) {

            return $this->logError('job.edit',[$data['jb_job_id']],$e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(JbJobCompetence $jobcompetence)
    {
        //
        try {
            
            $jobcompetence->delete();

            return $this->logSuccess('job.edit',[$jobcompetence->jb_job_id],'Job Competence Removed.');
    
        } catch (Exception $e) {
    
            return $this->logError('job.edit',[$jobcompetence->jb_job_id],$e->getMessage());
    
        }
    
    }


}
