<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Base\BaseController;

use App\Models\JbCandidateWorkExperience;

class CandidateWorkExperienceController extends BaseController
{
    protected $scrollTo = '#candidate-work-experience';
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
            'company_name'=>'required',
            'company_role'=>'required',
            'role_description'=>'required',
            'work_from'=>'required',
            'work_to'=>'required'
        ]);

        $data['jb_candidate_id'] = \Auth::user()->candidate->id;

        try {
            JbCandidateWorkExperience::create($data);
            return $this->logSuccess('candidate.edit',[$data['jb_candidate_id']],'Work Experience Added.');
        } catch (Exception $e) {
            return $this->logError('candidate.edit',[$data['jb_candidate_id']],$e->getMessage());
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
    public function destroy(JbCandidateWorkExperience $candidateworkexperience) //candidateworkexperience
    {
        //
        try {
            
            $candidateworkexperience->delete();
            return $this->logSuccess('candidate.edit',[$candidateworkexperience->jb_candidate_id],'Work Experience Removed');
        } catch (Exception $e) {
            return $this->logError('candidate.edit',[$candidateworkexperience->jb_candidate_id],$e->getMessage());
        }
    }
}
