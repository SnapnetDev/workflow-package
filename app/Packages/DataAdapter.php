<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/12/2020
 * Time: 1:19 PM
 */

namespace App\Packages;


use App\JbCandidateDocument;
use App\JbDisciplines;
use App\JbFilter;
use App\JbNotification;
use App\JbPermission;
use App\JbRole;
use App\JbRolePermission;
use App\JbSetting;
use App\Models\JbCandidate;
use App\Models\JbCandidateEducation;
use App\Models\JbCandidateJob;
use App\Models\JbCandidateSkill;
use App\Models\JbCandidateWorkExperience;
use App\Models\JbJob;
use App\Traits\CandidateJobNotificationTrait;
use App\Traits\MailTrait;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Smalot\PdfParser\Parser;

//use http\Env\Request;

class DataAdapter implements DataPort
{

	use CandidateJobNotificationTrait;
	use MailTrait;

    private $repoPort = null;
//    private $booleanPort = null;
    private $request = null;
	private $cvParser = null;
	private $scanPort = null;
	private $uploadPort = null;

    function __construct(RepoPort $repoPort, Request $request,Parser $parser,ScanPort $scanPort,UploadPort $uploadPort)
    {
        $this->repoPort = $repoPort;
//        $this->booleanPort = $booleanPort;
        $this->request = $request;
        $this->cvParser = $parser;
        $this->scanPort = $scanPort;
        $this->uploadPort = $uploadPort;
    }

    function submitApplication()
    {
        // TODO: Implement submitApplication() method.
        $userId = Auth::user()->id;
        $candidate = $this->repoPort->getCandidate($userId);
//        $jb_job_id = 0;
//        session()->put('jobId',$jobData['data']->id);
        $jb_job_id = session()->get('jobId'); //read from session
        $jb_candidate_id = $candidate['data']->id;

        $model = JbCandidateJob::where('jb_job_id',$jb_job_id)->where('jb_candidate_id',$jb_candidate_id)->first();
        if (is_null($model)){
            $model = new JbCandidateJob;
            $model->jb_job_id = $jb_job_id;
            $model->jb_candidate_id = $candidate['daata']->id;
            $model->approved = 0;
            $model->save();

            return [
                'message'=>'Your application has been successfully submitted.',
                'error'=>false,
                'data'=>$model
            ];

        }else{

            return [
                'message'=>'Your application has already been submitted.',
                'error'=>false,
                'data'=>$model
            ];

        }

    }

    function endCurrentApplication()
    {
        // TODO: Implement endCurrentApplication() method.
        session()->forget('jobId');
        return [
            'message'=>'Application successfully closed',
            'error'=>false
        ];

    }

    function enableNotification($userId)
    {
        // TODO: Implement enableNotification() method.

        $data = $this->repoPort->getMyNotification($userId);
        $data['data']->status = 1;
        $data['data']->save();
        return [
            'message'=>'Notification enabled',
            'error'=>false,
            'data'=>$data['data']
        ];

    }

    function disableNotification($userId)
    {
        // TODO: Implement disableNotification() method.

        $data = $this->repoPort->getMyNotification($userId);
        $data['data']->status = 0;
        $data['data']->save();
        return [
            'message'=>'Notification disabled',
            'error'=>false,
            'data'=>$data['data']
        ];

    }

    function markAsSeen($userId)
    {
        // TODO: Implement markAsSeen() method.
        $data = $this->repoPort->getMyNotification($userId);
        $data['data']->seen = 1;
        $data['data']->save();
        return [
            'message'=>'Notification marked as seen',
            'error'=>false,
            'data'=>$data['data']
        ];

    }

    function markAsUnSeen($userId)
    {
        // TODO: Implement markAsUnSeen() method.
        $data = $this->repoPort->getMyNotification($userId);
        $data['data']->seen = 0;
        $data['data']->save();
        return [
            'message'=>'Notification marked as seen',
            'error'=>false,
            'data'=>$data['data']
        ];

    }

    function createNotification($userId)
    {
        $obj = new JbNotification;
        $obj->user_id = $userId;
        $obj->status = 1;
        $obj->seen = 0;
        $obj->save();
        return [
            'message'=>'Notification created',
            'error'=>false,
            'data'=>$obj
        ];
        // TODO: Implement createNotification() method.
//        if (!$this->booleanPort->hasNotification($userId)){
//            $this->createNotification($userId);
//        }

    }


    function roleCreate(JbRole $jbRole)
    {
        // TODO: Implement roleCreate() method.

        $jbRole->name = $this->request->name;
        $jbRole->save();

        return [
            'message'=>'Jole added',
            'data'=>$jbRole,
            'error'=>false
        ];

    }

    function roleUpdate(JbRole $jbRole)
    {
        // TODO: Implement roleUpdate() method.
        $jbRole->name = $this->request->name;
        $jbRole->save();

        return [
            'message'=>'Jole updated',
            'data'=>$jbRole,
            'error'=>false
        ];

    }


    function permissionCreate(JbPermission $jbPermission)
    {

        // TODO: Implement permissionCreate() method.
//        $jbPermission->jb_role_id = $this->request->jb_role_id;
        $jbPermission->name = $this->request->name;
        $jbPermission->constant = $this->request->constant;
        $jbPermission->save();

        return [
            'message'=>'Permission added.',
            'error'=>false,
            'data'=>$jbPermission
        ];

    }

    function permissionUpdate(JbPermission $jbPermission)
    {
        // TODO: Implement permissionUpdate() method.
//        $jbPermission->jb_role_id = $this->request->jb_role_id;
        $jbPermission->name = $this->request->name;
	    $jbPermission->constant = $this->request->constant;
        $jbPermission->save();

        return [
            'message'=>'Permission updated.',
            'error'=>false,
            'data'=>$jbPermission
        ];

    }


    function userAssignRole(User $user)
    {

        // TODO: Implement userAssignRole() method.
        $user->jb_role_id = $this->request->jb_role_id;
        $user->save();

        return [
            'message'=>'Role assigned',
            'error'=>false,
            'data'=>$user
        ];

    }


    function rolePermissionCreate(JbRolePermission $jbRolePermission,$role_id,$permission_id)
    {
        // TODO: Implement rolePermissionCreate() method.
        $jbRolePermission->jb_role_id = $role_id;
        $jbRolePermission->jb_permission_id = $permission_id;
        $jbRolePermission->save();
        return [
            'message'=>'Permission added',
            'data'=>$jbRolePermission,
            'error'=>false
        ];
    }

//    function rolePermissionUpdate(JbRolePermission $jbRolePermission)
//    {
//        // TODO: Implement rolePermissionUpdate() method.
////        $jbRolePermission->jb_role_id = $this->request->jb_role_id;
//        $jbRolePermission->jb_permission_id = $this->request->jb_permission_id;
//        $jbRolePermission->save();
//        return [
//            'message'=>'Permission updated',
//            'data'=>$jbRolePermission,
//            'error'=>false
//        ];
//    }


    function updateUserProfile(User $user)
    {

    	if (request()->filled('password1')){

    		$password1 = request('password1');
    		$password2 = request('password2');



    		if (!empty($password1) && $password2 == $password1){

    			$user->password = Hash::make($password1);

//			    dd('ok');
		    }else{
//    			dd('nok');
    			return [
    				'message'=>'Invalid Password!',
				    'error'=>true
			    ];
		    }


	    }


        $user->name = $this->request->name;
        $user->jb_role_id = $this->request->jb_role_id;
	    $user->role = ($this->request->filled('default_user'))? 'user' : 'admin';
        $user->save();

        return [
            'message'=>'Profile saved',
            'error'=>false,
            'data'=>$user
        ];
    }

    function createUserProfile(User $user)
    {

        $user->name = $this->request->name;
        $user->email = $this->request->email;
        $user->role = ($this->request->filled('default_user'))? 'user' : 'admin';
        $user->jb_role_id = $this->request->jb_role_id;
        $user->password = Hash::make($this->request->password1);
        $user->save();

        return [
            'message'=>'User profile created.',
            'error'=>false,
            'data'=>$user
        ];

    }

	function candidateCreate(JbCandidate $jbCandidate)
	{
		return $this->candidateUpdateInput($jbCandidate);
	}

    private function candidateUpdateInput(JbCandidate $jbCandidate){

    	$jbCandidate->name = $this->request->name;
	    $jbCandidate->email = $this->request->email;
	    $jbCandidate->phone_number = $this->request->phone_number;
	    $jbCandidate->address = $this->request->address;
	    $jbCandidate->age = $this->request->age;
	    $jbCandidate->gender = $this->request->gender;
	    $jbCandidate->marital_status = $this->request->marital_status;
	    $jbCandidate->cover_letter = $this->request->cover_letter;

	    $jbCandidate->jb_discipline_id = $this->request->jb_discipline_id;

	    $jbCandidate->user_id = Auth::user()->id;

	    $jbCandidate = $this->scanPort->scanPdf($this->request, $jbCandidate);

	    $jbCandidate = $this->uploadPort->candidateUploadCv($jbCandidate);

	    $jbCandidate->save();

	    return [
		    'message'=>'Application saved',
		    'error'=>false,
		    'data'=>$jbCandidate
	    ];
    }


	function candidateUpdate(JbCandidate $jbCandidate)
	{
//		dd(1);
        return $this->candidateUpdateInput($jbCandidate);
	}




	function jobCreate(JbJob $jbJob)
	{
		// TODO: Implement jobCreate() method.
	}

	function jobUpdate(JbJob $jbJob)
	{

	}


	function disciplineCreate(JbDisciplines $jbDisciplines)
	{
		// TODO: Implement disciplineCreate() method.
	}

	function disciplineUpdate(JbDisciplines $jbDisciplines)
	{
		// TODO: Implement disciplineUpdate() method.
	}

	function documentCreate(JbCandidateDocument $jbCandidateDocument)
	{
		// TODO: Implement documentCreate() method.

		$jbCandidateDocument->name = $this->request->name;
		$jbCandidateDocument->user_id = Auth::user()->id;
		$this->doDocumentUploads($jbCandidateDocument);
		$jbCandidateDocument->save();

		return [
			'message'=>'Document added',
			'data'=>$jbCandidateDocument,
			'error'=>false
		];

	}

	private function doDocumentUploads($model){
		$path = '';
		if ($this->request->file('doc')){
			$model->file = $this->request->file('doc')->store($path,[
				'disk'=>'uploads'
			]);
		}
	}

	function documentUpdate(JbCandidateDocument $jbCandidateDocument)
	{

		$jbCandidateDocument->name = $this->request->name;
//		$jbCandidateDocument->user_id = Auth::user()->id;
		$this->doDocumentUploads($jbCandidateDocument);
		$jbCandidateDocument->save();

		return [
			'message'=>'Document saved',
			'data'=>$jbCandidateDocument,
			'error'=>false
		];

	}

	function candidateJobApply(JbCandidateJob $jbCandidateJob,callable $callback=null)
	{

      $requiresVideo = JbJob::find($this->request->jb_job_id)->requiresVideo();
      $hasVideoCv = Auth::user()->hasVideoCv();

//      dd($requiresVideo);
//      dd($hasVideoCv);
      if ($requiresVideo){
      	if (!$hasVideoCv){
      		return [
		        'message'=>'This job requires you to upload a video CV!!!',
		        'error'=>true,
		        'data'=>null
	        ];
        }
      }

      $callback();

	  $jbCandidateJob->jb_job_id = $this->request->jb_job_id;
	  $jbCandidateJob->jb_candidate_id = $this->request->jb_candidate_id;
	  $jbCandidateJob->approved = 0;
	  $jbCandidateJob->save();

	  return [
	  	'message'=>'Job applied for successfully.',
		'error'=>false,
		'data'=>$jbCandidateJob
	  ];

	}


	function candidateEductionCreate(JbCandidateEducation $jbCandidateEducation)
	{
//		dd($jbCandidateEducation);

        $jbCandidateEducation->jb_candidate_id = $this->request->jb_candidate_id;
        $jbCandidateEducation->name = $this->request->name;
        $jbCandidateEducation->qualifications = $this->request->qualifications;
        $jbCandidateEducation->date_from = $this->request->date_from;
        $jbCandidateEducation->date_to = $this->request->date_to;
        $jbCandidateEducation->user_id = Auth::user()->id;

        $jbCandidateEducation->save();

        return [
        	'message'=>'Education added',
	        'error'=>false,
	        'data'=>$jbCandidateEducation
        ];

	}

	function candidateEducationUpdate(JbCandidateEducation $jbCandidateEducation)
	{
//		$jbCandidateEducation->jb_candidate_id = $this->request->jb_candidate_id;
		$jbCandidateEducation->name = $this->request->name;
		$jbCandidateEducation->qualifications = $this->request->qualifications;
		$jbCandidateEducation->date_from = $this->request->date_from;
		$jbCandidateEducation->date_to = $this->request->date_to;
//		$jbCandidateEducation->user_id = Auth::user()->id;

		$jbCandidateEducation->save();

		return [
			'message'=>'Education saved',
			'error'=>false,
			'data'=>$jbCandidateEducation
		];
	}


	function candidateSkillCreate(JbCandidateSkill $jbCandidateSkill)
	{
		$jbCandidateSkill->jb_candidate_id = $this->request->jb_candidate_id;
		$jbCandidateSkill->name = $this->request->name;
		$jbCandidateSkill->user_id = Auth::user()->id;

		$jbCandidateSkill->save();
		return [
			'message'=>'Skill added',
			'error'=>false,
			'data'=>$jbCandidateSkill
		];
	}

	function candidateSkillUpdate(JbCandidateSkill $jbCandidateSkill)
	{
//		$jbCandidateSkill->jb_candidate_id = $this->request->jb_candidate_id;
		$jbCandidateSkill->name = $this->request->name;
//		$jbCandidateSkill->user_id = Auth::user()->id;

		$jbCandidateSkill->save();
		return [
			'message'=>'Skill saved',
			'error'=>false,
			'data'=>$jbCandidateSkill
		];
	}

	function candidateWorkExperienceCreate(JbCandidateWorkExperience $jbCandidateWorkExperience)
	{
		$jbCandidateWorkExperience->company_name = $this->request->company_name;
		$jbCandidateWorkExperience->company_role = $this->request->company_role;
		$jbCandidateWorkExperience->role_description = $this->request->role_description;
		$jbCandidateWorkExperience->work_from = $this->request->work_from;
		$jbCandidateWorkExperience->work_to = $this->request->work_to;
		$jbCandidateWorkExperience->jb_candidate_id = $this->request->jb_candidate_id;
		$jbCandidateWorkExperience->save();

		return [
			'message'=>'Work experience added',
			'error'=>false,
			'data'=>$jbCandidateWorkExperience
		];
	}

	function candidateWorkExperienceUpdate(JbCandidateWorkExperience $jbCandidateWorkExperience)
	{

		$jbCandidateWorkExperience->company_name = $this->request->company_name;
		$jbCandidateWorkExperience->company_role = $this->request->company_role;
		$jbCandidateWorkExperience->role_description = $this->request->role_description;
		$jbCandidateWorkExperience->work_from = $this->request->work_from;
		$jbCandidateWorkExperience->work_to = $this->request->work_to;
//		$jbCandidateWorkExperience->jb_candidate_id = $this->request->jb_candidate_id;
		$jbCandidateWorkExperience->save();

		return [
			'message'=>'Work experience saved',
			'error'=>false,
			'data'=>$jbCandidateWorkExperience
		];

	}

	function filterCreate(JbFilter $jbFilter)
	{
//		dd($this->request->keywords);
		$jbFilter->name = $this->request->name;
		$jbFilter->keywords = implode('_comma_', $this->request->keywords);
		$jbFilter->user_id = Auth::user()->id;
		$jbFilter->save();

		return [
			'message'=>'Filter added.',
			'error'=>false,
			'data'=>$jbFilter
		];

	}

	function filterUpdate(JbFilter $jbFilter)
	{

//		$jbFilter->name = $this->request->name;
//		$jbFilter->keywords = $this->request->keywords;
		$jbFilter->keywords = implode('_comma_', $this->request->keywords);
//		$jbFilter->user_id = Auth::user()->id;
		$jbFilter->save();

		return [
			'message'=>'Filter saved.',
			'error'=>false,
			'data'=>$jbFilter
		];

	}

	function settingCreate(JbSetting $jbSetting)
	{
		$jbSetting->name = $this->request->name;
		$jbSetting->value = $this->request->value;
		$jbSetting->save();

		return [
			'message'=>'Settings created',
			'data'=>$jbSetting,
			'error'=>false
		];
	}

	function settingUpdate(JbSetting $jbSetting)
	{
//		$jbSetting->name = $this->request->name;
		$jbSetting->value = $this->request->value;
		$jbSetting->save();

		return [
			'message'=>'Settings saved',
			'data'=>$jbSetting,
			'error'=>false
		];
	}

	function candidateJobUpdateStatus(JbCandidateJob $jbCandidateJob)
	{

		if ($this->request->status == 'onboarded_to_hcm'){

			$jbCandidate = $jbCandidateJob->candidate;

			(new JbCandidate)->pushToHcMatrix($jbCandidate);

		}

		$jbCandidateJob->status = $this->request->status;
		$jbCandidateJob->save();

		$ref = $this;
		$this->sendJobApplicationStatus($jbCandidateJob, $this->request->status,function($client) use ($ref){

			$ref->sendMail(function($config) use ($client){
				return $client;
			});

		});

		return [
			'message'=>'Status updated',
			'error'=>false,
			'data'=>$jbCandidateJob
		];

	}


}