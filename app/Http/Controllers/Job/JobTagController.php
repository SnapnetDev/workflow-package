<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\BaseController;
use App\Models\JbJobTag;


class JobTagController extends BaseController
{

    protected $scrollTo = '#job-tag';
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
          'jb_job_id'=>'required',
          'name'=>'required'
        ]);

        try {
            JbJobTag::create($data);    
            return $this->logSuccess('job.edit',[$data['jb_job_id']],'Job Tag Added.');
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
    public function destroy(JbJobTag $jobtag)
    {
        //
        try {
            $jobtag->delete();           
            return $this->logSuccess('job.edit',[$jobtag->jb_job_id],'Job Tag removed.');
        } catch (Exception $e) {
            return $this->logError('job.edit',[$jobtag->jb_job_id],$e->getMessage());
        }
    }

}
