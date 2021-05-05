<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\JbJobSkill;

use App\Http\Controllers\Base\BaseController;


class JobSkillController extends BaseController
{

    
    protected $scrollTo = '#job-skill';

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
    
            JbJobSkill::create([
                'jb_job_id'=>$data['jb_job_id'],
                'jb_skill_id'=>$data['jb_skill_id']
            ]);
    
            return $this->logSuccess('job.edit',[$data['jb_job_id']],'Job Skill added.');
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
    public function destroy(JbJobSkill $jobskill)
    {
        //
        try {
             
            $jobskill->delete();

            return $this->logSuccess('job.edit',[$jobskill->jb_job_id],'Job Skill removed.');

        } catch (Exception $e) {
            
            return $this->logError('job.edit',[$jobskill->jb_job_id],$e->getMessage());
            
        }

    }
}
