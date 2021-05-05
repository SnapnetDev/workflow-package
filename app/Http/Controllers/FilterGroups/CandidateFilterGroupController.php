<?php

namespace App\Http\Controllers\FilterGroups;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\BaseController;


use App\Models\JbFilterGroup;
use App\Models\JbCandidateFilterGroup;

use Exception;
use Auth;

class CandidateFilterGroupController extends BaseController
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
    public function edit(JbCandidateFilterGroup $candidatefiltergroup)
    {
        //
        return view('candidatefiltergroup.edit',[
            'candidatefiltergroup'=>$candidatefiltergroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,JbCandidateFilterGroup $candidatefiltergroup)
    {
        //
        $data = request()->validate([
          'comments'=>'required'  
        ]);

        try {
            $candidatefiltergroup->update($data);
            return $this->logSuccess('filtergroup.candidates',[$candidatefiltergroup->jb_filter_group_id],'Comments added successfully.');
        }catch(Exception $e){
            return $this->logError('filtergroup.candidates',[$candidatefiltergroup->jb_filter_group_id],$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JbCandidateFilterGroup $candidatefiltergroup)
    {
        //
        try {
            $candidatefiltergroup->delete();
            return $this->logSuccess('filtergroup.candidates',[$candidatefiltergroup->jb_filter_group_id],'Candidate removed from filter.');
        } catch (Exception $e) {
            return $this->logError('filtergroup.candidates',[$candidatefiltergroup->jb_filter_group_id],$e->getMessage());
        }
    }
}
