<?php

namespace App\Models;

use App\JbCandidateFolder;
use App\JbDisciplines;
use App\Traits\CandidateTrait;
use App\Traits\ThirdPartyHandShakeTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser as SmalotParser;


class JbCandidate extends Model
{

	use ThirdPartyHandShakeTrait;
	use CandidateTrait;
	//
	protected $table = 'jb_candidates';

	protected $fillable = ['user_id', 'name', 'email', 'phone_number', 'address', 'age', 'gender', 'marital_status', 'cover_letter', 'cv_string', 'cv_upload'];
	//cv_upload

	// 'name'=>'required',
	// 'email'=>'required',
	// 'phone_number'=>'required',
	// 'address'=>'required',
	// 'date_of_birth'=>'required',
	// 'gender'=>'required',
	// 'marital_status'=>'required',
	// 'cover_letter'=>'required'


	// const UPDATED_AT = null;
	// const CREATED_AT = null;

	static function myCv($userID)
	{
		return JbCandidate::where('user_id', $userID)->first();
	}

	function discipline(){
		return $this->belongsTo(JbDisciplines::class,'jb_discipline_id');
	}

	function getDiscipline(){
		$obj = $this->discipline;
		if (is_null($obj)){
			return 'N/A';
		}else{
			return $obj->name;
		}
	}

	function candidateEducations()
	{
		return $this->hasMany(JbCandidateEducation::class, 'jb_candidate_id');
	}



	function candidateJobs()
	{
		return $this->hasMany(JbCandidateJob::class, 'jb_candidate_id');
	}

	function candidate_jobs()
	{
		return $this->hasMany(JbCandidateJob::class, 'jb_candidate_id');
	}

	function getJobStatus($jb_job_id){
		$candidateId = $this->id;
		$query = (new JbCandidateJob)->newQuery();
		$query = $query->where('jb_job_id',$jb_job_id)->where('jb_candidate_id',$candidateId);
		$obj = $query->first();
		if (is_null($obj)){
			return 'Pending.';
		}else{
			return $obj->status;
		}

	}


	function candidateCertifications()
	{
		return $this->hasMany(JbCandidateCertification::class, 'jb_candidate_id');
	}

	function candidateSkills()
	{
		return $this->hasMany(JbCandidateSkill::class, 'jb_candidate_id');
	}

	function candidateWorkExperience()
	{
		return $this->hasMany(JbCandidateWorkExperience::class, 'jb_candidate_id');
	}

	function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	function competencies()
	{
		return $this->hasMany(JbCandidateCompetency::class, 'jb_candidate_id');
	}

	function grabCvText(SmalotParser $parser, Request $request)
	{

		$allowed = ['pdf'];

		if ($request->has('cv_upload') || !is_null($request->cv_upload)) {

			$mime = $request->cv_upload->getClientOriginalextension();

			if (!(in_array($mime, $allowed))) : throw new \Exception("Invalid File Type");
			endif;

			$pdf = $parser->parseFile($request->cv_upload->getRealPath());

			$text = $pdf->getText();

			$text =  $this->scanText($text);


			$this->update([
				'cv_string' => $text
			]);
		}
	}

	function scanText($txt)
	{
		$r = [];
		for ($c = 0; $c < strlen($txt); $c++) {
			if ($txt[$c] == "," || $txt[$c] == '.') {
				$r[] = "_SPC_";
			} else {
				$r[] = trim($txt[$c]);
			}
		}
		return implode('', $r);
	}

	function grabCvFile($request)
	{
		//cv_upload
		if ($request->has('cv_upload')) {
			$path = $request->file('cv_upload')->store('cv_upload');
			$this->update([
				'cv_upload' => $path
			]);
		}
	}






	function runFilter($filters = [])
	{

		return (new JbFilter)->applyAndGetFilterResult($this, $filters);
	}


	function getNextId(){
		$id = $this->id;
		$query = (new JbCandidate)->fetch([]);
//      dd($query->where('id','<',$id)->first());
		$query = $query->where('id','<',$id);
		$nextId = $query->max('id');

//      echo $nextId . '...';
		return $nextId;
	}

	function getPrevId(){
		$id = $this->id;
		$query = (new JbCandidate)->fetch([]);
		$prevId = $query->where('id','>',$id)->min('id');
		return $prevId;
	}



	public function getCreatedAtAttribute($date)
	{

		return Carbon::createFromFormat('Y-m-d', date('Y-m-d',strtotime($date)));
//		$this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}


	public function getUpdatedAtAttribute($date)
	{
		return Carbon::createFromFormat('Y-m-d', date('Y-m-d',strtotime($date)));
		//$this->attributes['updated_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}


	function candidate_folder(){
		return $this->hasMany(JbCandidateFolder::class,'jb_candidate_id');
	}


}
