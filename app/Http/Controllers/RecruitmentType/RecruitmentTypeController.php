<?php

namespace App\Http\Controllers\RecruitmentType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Base\BaseController;
use App\Models\JbRecruitmentType;

class RecruitmentTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $rootTemplate = 'recruitment_type'; 
    private $resource = 'recruitmenttype';
    private $storeMessage = 'Recruitment Type Added';
    private $destroyMessage = 'Recruitment Type Removed';
    private $updateMessage = 'Recruitment Type Saved';

    public function index()
    {
        //
        return view($this->rootTemplate . '.index',[
             'recruitmentTypes'=>JbRecruitmentType::all()
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
        return view($this->rootTemplate . '.create');
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
              'name'=>'required'
        ]);
        $data['created_by'] = \Auth::user()->id;
        try {

            JbRecruitmentType::create($data);
            return $this->logSuccess($this->resource . '.index',[],$this->storeMessage);
        } catch (Exception $e) {
            return $this->logError($this->competence . '.create',[],$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JbRecruitmentType $recruitmenttype)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JbRecruitmentType $recruitmenttype)
    {
        //
        return view($this->rootTemplate . '.edit',[
          'recruitmentType'=>$recruitmenttype
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JbRecruitmentType $recruitmenttype)
    {
        //
        try {
            $recruitmenttype->update(request()->validate([
              'name'=>'required' 
            ]));
            return $this->logSuccess($this->resource . '.index',[],$this->updateMessage);
        } catch (Exception $e) {
            return $this->logError($this->resource . '.edit',[],$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JbRecruitmentType $recruitmenttype)
    {
        //
        try {
            $recruitmenttype->delete();
            return $this->logSuccess($this->resource . '.index',[],$this->destroyMessage);
        } catch (Exception $e) {
            return $this->logError($this->resource . '.index',[],$e->getMessage());
        }
    }

}
