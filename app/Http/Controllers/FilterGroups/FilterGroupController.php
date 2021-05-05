<?php

namespace App\Http\Controllers\FilterGroups;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Base\BaseController;

use App\Models\JbFilterGroup;
use Exception;
use Auth;

use App\Models\JbSkill;
use App\Models\JbCertification;
use App\Models\JbJobTag;


class FilterGroupController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('filter_group.index',[
           'filterGroups'=>JbFilterGroup::paginate(7)  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('filter_group.create');
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
           'name'=>'required',
           'comments'=>'required'
        ]);
        $data['user_id'] = Auth::user()->id;
        try {
            
           JbFilterGroup::create($data);
           return $this->logSuccess('filtergroup.index',[],'New Filter Group Added.'); 
        } catch (Exception $e) {
           return $this->logError('filtergroup.index',[],$e->getMessage()); 
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
    public function edit(JbFilterGroup $filtergroup)
    {
        //
        return view('filter_group.edit',[
          'filtergroup'=>$filtergroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,JbFilterGroup $filtergroup)
    {
        $data = request()->validate([
          'name'=>'required',
          'comments'=>'required'
        ]); 
        try {
           
           $filtergroup->update($data);
           return $this->logSuccess('filtergroup.index',[],'Group Filter Saved.');
        } catch (Exception $e) {
           return $this->logError('filtergroup.index',[],$e->getMessage()); 
        }

        
        //
    }


    function candidates(JbFilterGroup $filterGroup){

        return view('filter_group.candidates',[
           'jobSkills'=>JbSkill::all(),
           'jobCertifications'=>JbCertification::all(),
           'tags'=>JbJobTag::all(),
           'filterGroup'=>$filterGroup
        ]);

    }

    function candidatesAjax(JbFilterGroup $filterGroup){
        // dd($job->runFilter([]));
      // dd(JbFilterGroup::where('id',Auth::user()->id)->get());
      // dd(request()->all());
        // dd($filterGroup->runFilter(request()->all())->get());

         return view('filter_group.candidates_ajax',[
          'candidates'=>$filterGroup->runFilter(request()->all())->paginate(7), //paginate
          'filterGroups'=>JbFilterGroup::where('user_id',Auth::user()->id)->get(),
          'filters'=>request()->all()
         ]);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JbFilterGroup $filtergroup)
    {
        //
        try {
            $filtergroup->delete();
            return $this->logSuccess('filtergroup.index',[],'Filter group removed.');
        } catch (Exception $e) {
            return $this->logError('filtergroup.index',[],$e->getMessage());
        }

    }

}
