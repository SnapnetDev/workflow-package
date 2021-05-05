<?php

namespace App\Http\Controllers\Competence;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Base\BaseController;
use App\Models\JbCompetence;

class CompetenceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $rootTemplate = 'competence'; 
    private $resource = 'competence';
    private $storeMessage = 'Competence Added';
    private $destroyMessage = 'Competence Removed';
    private $updateMessage = 'Competence Saved';

    public function index()
    {
        //
        return view($this->rootTemplate . '.index',[
             'competencies'=>JbCompetence::all()
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

            JbCompetence::create($data);
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
    public function show(JbSkill $skill)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JbCompetence $competence)
    {
        //
        return view($this->rootTemplate . '.edit',[
          'competence'=>$competence
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JbCompetence $competence)
    {
        //
        try {
            $competence->update(request()->validate([
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
    public function destroy(JbCompetence $competence)
    {
        //
        try {
            $competence->delete();
            return $this->logSuccess($this->resource . '.index',[],$this->destroyMessage);
        } catch (Exception $e) {
            return $this->logError($this->resource . '.index',[],$e->getMessage());
        }
    }

}
