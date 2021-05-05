<?php

namespace App\Http\Controllers;

use App\Models\CandidateStage;
use App\Models\JbCandidateJob;
use App\Models\Stage;
use App\Notifications\GeneralNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Auth;

class CandidateStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $query = (new CandidateStage)->newQuery();

	    $query = $query->whereHas('candidate_job',function(Builder $builder){
	       return $builder->whereHas('job',function (Builder $builder){

//	         if (request()->filled('job_select')){
		        return $builder->where('id',request('job_select'));
// 	         }

//	       	 return $builder;

	       });
	    })->whereHas('stage',function(Builder $builder){

	    	if (request()->filled('stage_select')){
			    $builder->where('id',request('stage_select'));
		    }

	    	return $builder;

	    });

	    return [
	    	'list'=>$query->get()
	    ];

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


    private function getFirstStage(){
    	$query = (new Stage)->newQuery();
    	$query = $query->where('position',0);
    	return $query->first();
    }


    public function store(Request $request)
    {
        //

	    if (!request()->filled('candidates')){
	    	return [
	    		'message'=>'Invalid candidate selection',
			    'error'=>true
		    ];
	    }

	    $stage = $this->getFirstStage();

	    if (!$stage){
	    	return [
	    		'message'=>'Please configure your recruitment stages!',
			    'error'=>true
		    ];
	    }

	    $candidates = request('candidates');
	    $job_id = request('job_id');

	    foreach ($candidates as $candidate){


		    $candidateJob = $this->getCandidateJob($candidate, $job_id);

//		    dd($candidateJob);

		    //candidate_job_id

		    $check = (new CandidateStage)->newQuery();

		    $check = $check->where('candidate_job_id',$candidateJob->id)->first();

		    if (!$check){

		    	$obj = new CandidateStage;
		    	$obj->candidate_job_id = $candidateJob->id;
		    	$obj->stage_id = $stage->id;
		    	$obj->save();

		    }


	    }

	    return [
	    	'message'=>'Recruitment process started',
		    'error'=>false
	    ];




    }

    private function getCandidateJob($candidateId,$jobId){
    	$query = (new JbCandidateJob)->newQuery();
    	$query = $query->where('jb_candidate_id',$candidateId)->where('jb_job_id',$jobId);
    	return $query->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CandidateStage  $candidateStage
     * @return \Illuminate\Http\Response
     */
    public function show(CandidateStage $candidateStage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CandidateStage  $candidateStage
     * @return \Illuminate\Http\Response
     */
    public function edit(CandidateStage $candidateStage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CandidateStage  $candidateStage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


    }

    private function getNextStage($stage_id){
      $query = (new Stage)->newQuery();
      $query = $query->where('id','>',$stage_id);
      $query = $query->orderBy('id','asc');
      return $query->first();
    }

    function progressStage(){


    	 //candidate_stage_id[]
	    //candidate_job_id[]
	    //stage_id

	    $candidate_stage_id = request('candidate_stage_id');
	    $candidate_job_id = request('candidate_job_id');
	    $stage_id = request('stage_id');

	    $newStage = $this->getNextStage($stage_id);

	    if (is_null($newStage)){
	    	return [
	    		'message'=>'Already gotten to final stage!',
			    'error'=>true
		    ];
	    }



        foreach ($candidate_stage_id as $k=>$item){

	    	$check = (new CandidateStage)->newQuery(); //candidate_job->candidate->user
	    	$check = $check->where('candidate_job_id',$candidate_job_id[$k]);
	    	$check = $check->where('stage_id',$newStage->id);

	        $obj = new CandidateStage;

	    	if ($check->exists()){
	    		$obj = $check->first();
		    }

	        $obj->candidate_job_id = $candidate_job_id[$k];
	        $obj->stage_id = $newStage->id;
	        $obj->comment = request('comment');
	        $obj->status = 1;
	        $obj->approved_by = Auth::user()->id;
	        $obj->save();

	        //Notification section.
	        $noti = new GeneralNotification;

	        $noti->settings()->subject('RECRUITMENT PROGRESS (' . $newStage->percentage . '%) ');
	        $noti->settings()->line('Dear Applicant,');
	        $noti->settings()->line('Your application has just been processed,');
	        $noti->settings()->line('and you are currently at the ' . $newStage->stage_name . ' stage');

	        $noti->settings()->line('Additional Info');

	        $r = $comment = request('comment');
	        $r = explode("\n\r", $r);
	        foreach ($r as $rr){
		        $noti->settings()->line($rr);
	        }

	        $noti->settings()->line('Kind regards,');
	        $noti->settings()->line('HC-Recruit');

	        try{
		        $obj->candidate_job->candidate->user->notify($noti);
	        }catch(\Exception $ex){

	        }

        }

	    return [
		    'message'=>'Selected entries progressed to next stage successfully.',
		    'error'=>false
	    ];


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CandidateStage  $candidateStage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandidateStage $candidateStage)
    {
        //
    }
}
