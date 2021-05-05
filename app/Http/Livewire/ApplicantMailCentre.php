<?php

namespace App\Http\Livewire;

use App\JbFilter;
use App\JbFolder;
use App\Models\JbCandidate;
use App\Models\JbJob;
use App\Traits\MailTrait;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ApplicantMailCentre extends Component
{

	use MailTrait;

	protected $listeners = ['tell'];


	public $filters = [];
	public $jobRoles = [];
	public $folders = [];
	public $applicants = [];
	public $applicantsSelected = [];

	public $filterSelect,$jobRoleSelect,$folderSelect;

	public $to,$subject,$message,$tellMsg;

	public $exclude = [];


	function tell($data){
		$this->tellMsg = json_encode($data);
	}

	function mount(){
	  	$this->refresh();
	}

	function updated(){
		$this->refresh();
	}

	private function refresh(){
        $this->fetchFilters();
        $this->fetchJobRoles();
        $this->fetchFolders();
        $this->queryFetchApplicants();
        $this->getEmails();
	}

	function updatedApplicants($checked,$value){
      
      if ($checked){
        
        unset($this->exclude[$value]);   

        return;    
      }


      $this->exclude[$value*1] = $value;

	  
	  // $this->to = json_encode($this->exclude); //'selected.' . $checked . '.' . $value;

	}

	private function fetchFilters(){
		$this->filters = JbFilter::all();
	}

	private function fetchJobRoles(){
		$this->jobRoles = JbJob::all();
	}

	private function fetchFolders(){
        $this->folders = JbFolder::all();
	}

	private function atLeastOneIsSelected(){

	}

	function queryFetchApplicants(){

	   $searched = false;

	   $query = (new JbCandidate)->newQuery();


	   //filters start

//		$query = (new JbCandidate)->newQuery();

		if (!empty($this->jobRoleSelect)){
			$jobRoleSelect = $this->jobRoleSelect;
			$query = $query->whereHas('candidate_jobs',function(Builder $builder) use ($jobRoleSelect){
				return $builder->where('jb_job_id',$jobRoleSelect);
			});
			$searched = true;
		}

//		if (isset($filters['id'])){
//			$query = $query->where('id',$filters['id']);
//		}

		if (!empty($this->filterSelect)){
			$coll = JbFilter::find($this->filterSelect);
			$keywords = $coll->keywords;
//		    $query = $query->where('','like','%' . $keywords . '%');
			$keywords = explode('_comma_', $keywords);
			foreach ($keywords as $k=>$v){
				$query = $query->where('cv_string','like','%' . $v . '%');
			}
		  $searched = true;
		}

		if (!empty($this->folderSelect)){

			$folder_s = $this->folderSelect;

			$query = $query->whereHas('candidate_folder',function(Builder $builder) use ($folder_s){

				return $builder->where('jb_folder_id',$folder_s);

			});

			$searched = true;

		}


		//filters stop


	  if ($searched){
		  $this->applicants = $query->get('email');
		  return;
	  }

	  $this->applicants = [];

//		dd($this->applicants);

	}


	function getEmails(){
		
		$r = [];
		
		foreach ($this->applicants as $k=>$applicant){

          $found = true;

          foreach ($this->exclude as $key => $value) {
             $key = $key * 1;
             if ($k != $key){
               $r[] = $applicant->email; 
             } 	
          } 

          // if (!in_array($k, $this->exclude)){
          // }
			
		}

		$this->to =implode(',', $r);

	}

	private function genCode($email){

		$query = (new JbCandidate)->newQuery();
		$query = $query->where('email',$email);
		$obj = $query->first();

		$salt = md5($obj->user_id);
		$salt = substr($salt, -5);

        return strtoupper('EMP' . $salt);		

	}

	function sendCandidateMail(){
//		$this->applicants = $query->get('email');

		$tos = $this->to;
		$subject = $this->subject;
		$message = $this->message;

		$tos = explode(',', $tos);

		$message = explode("\n", $message);
		$message = implode('<br />', $message);


		foreach ($tos as $to){

			$code = $this->genCode($to);


			$msg = '<h2>Applicant Code#: ' . $code . ' </h2><br /><hr />' . $message;

			$this->sendMail(function() use ($to,$subject,$msg){
				return [

					'to'=>$to,
					'subject'=>$subject,
					'message'=>$msg

				];
			});

		}



		$this->emit('toast_notify', [
			'message'=>'Mail sent.',
			'error'=>false
		]);

		$this->emit('save_to_ls', [
			'name'=>'AKL',
			'phone'=>'08175299162'
		]);


	}



    public function render()
    {
        return view('livewire.applicant-mail-centre');
    }

}
