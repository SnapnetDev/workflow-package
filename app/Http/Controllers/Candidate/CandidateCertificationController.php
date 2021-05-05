<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Base\BaseController;
use App\Models\JbCandidateCertification;


class CandidateCertificationController extends BaseController
{
    protected $scrollTo = '#candidate-certification';
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
           'jb_certification_id'=>'required',
           'date_certified'=>'required'
        ]);

        $data['jb_candidate_id'] = \Auth::user()->candidate->id;
        
        try {
            JbCandidateCertification::create($data);
            return $this->logSuccess('candidate.edit',[$data['jb_candidate_id']],'Candidate Certification Added.');
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
    public function destroy(JbCandidateCertification $candidatecertification)
    {
        //
        try {
          $candidatecertification->delete();
          return $this->logSuccess('candidate.edit',[$candidatecertification->jb_candidate_id],'Candidate Certification Removed.');  
        } catch (Exception $e) {
          return $this->logError('candidate.edit',[$candidatecertification->jb_candidate_id],$e->getMessage());    
        }

    }
}
