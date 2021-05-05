<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/12/2020
 * Time: 1:20 PM
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
use App\User;
use Illuminate\Http\Request;

class RepoAdapter implements RepoPort
{
    private $request = null;
    private $filterPort = null;

    function __construct(Request $request,FilterPort $filterPort)
    {
      $this->request = $request;
      $this->filterPort = $filterPort;
    }

    function getMyNotification($userId)
    {
        // TODO: Implement getMyNotification() method.

        return [
            'data'=>JbNotification::where('user_id',$userId)->first()
        ];
    }

    function getCandidate($userId)
    {
        // TODO: Implement getCandidate() method.
        return [
            'data'=>JbCandidate::where('user_id',$userId)->first()
        ];
    }

    function roleFetch()
    {
        // TODO: Implement roleFetch() method.
        return [
            'list'=>JbRole::all()
        ];
    }

    function roleGet($id)
    {
        // TODO: Implement roleGet() method.
        return [
            'data'=>JbRole::find($id)
        ];
    }

    function permissionFetch()
    {
        // TODO: Implement permissionFetch() method.

        return [
            'list'=>JbPermission::paginate(7)
        ];

    }

    function permissionGet($id)
    {
        // TODO: Implement permissionGet() method.

        return [
            'data'=>JbPermission::find($id)
        ];
    }

    function userGet($id)
    {
        // TODO: Implement userGet() method.
        return [
            'data'=>User::find($id)
        ];
    }

    function candidateFetch()
    {

        // TODO: Implement candidateFetch() method.
        $query = User::where('role','user')->orWhere('role','0');
        $query = $this->handleFilter($query);
        return [
            'list'=>$query->paginate(7)
        ];

    }

    private function handleFilter($query){
        if ($this->request->filled('email')){
            $query = $query->where('email','like','%' . $this->request->search_text . '%');
        }
        return $query;
    }

    function userFetch()
    {
        // TODO: Implement userFetch() method.
        $query = User::where('role','admin');
        $query = $this->handleFilter($query);
        return [
            'list'=>$query->paginate(7)
        ];
    }

    function rolePermissionFetch($role_id)
    {
        // TODO: Implement rolePermissionFetch() method.
        return [
            'list'=>JbRolePermission::where('jb_role_id',$role_id)->get()
        ];
    }

    function rolePermissionGet($id)
    {
        // TODO: Implement rolePermissionGet() method.
        return [
            'list'=>JbRolePermission::find($id)
        ];
    }

	function candidateGet($id)
	{
		// TODO: Implement candidateGet() method.
		return [
			'data'=>JbCandidate::find($id)
		];
	}

	function disciplineFetch()
	{
		// TODO: Implement disciplineFetch() method.
		return [
			'list'=>JbDisciplines::get()
		];
	}

	function disciplineGet($id)
	{
		// TODO: Implement disciplineGet() method.
		return [
			'data'=>JbDisciplines::find($id)
		];
	}

	function documentFetch($userId)
	{
		// TODO: Implement documentFetch() method.
		return [
			'list'=>JbCandidateDocument::where('user_id',$userId)->get()
		];
	}

	function documentGet($id)
	{
		// TODO: Implement documentGet() method.
		return [
			'data'=>JbCandidateDocument::find($id)
		];
	}

	function getActiveNotifications()
	{
		$collection = JbNotification::where('status',1)->get();
		return [
			'list'=>$collection
		];
	}

	function candidateJobFetchAll(callable $callback = null)
	{

		$query = new JbCandidateJob;


		if (!is_null($callback)){
			$query = $callback($query);
		}else{
			$query = $this->filterPort->applicantFilterByJob($query);
		}

		if ($this->request->filled('prefSelection')){
			$prefSelection = $this->request->prefSelection;
			$filterData = $this->filterGet($prefSelection);
//			dd($filterData);
			$query = $this->filterPort->applicantFilterByStoredPref($query,$filterData['data']);
		}

        $collection = $query->orderBy('id','desc')->paginate(20);

        return [
        	'list'=>$collection
        ];

	}

	function filterGet($id)
	{
		return [
			'data'=>JbFilter::find($id)
		];
	}

	function candidateJobFetchByJob($jobId)
	{
      $collection = JbCandidateJob::where('jb_job_id',$jobId)->paginate(7);
      return [
      	'list'=>$collection
      ];
	}

	function jobFetchValid()
	{
		$collection = JbJob::orderBy('id','desc')->where('expiry_date','>=',date('Y-m-d h:i:s'))->get();
		return [
			'list'=>$collection
		];
	}

	function jobFetchAll()
	{
		$collection = JbJob::orderBy('id','desc')->all();
		return [
			'list'=>$collection
		];
	}

	function candidateEducationFetch($candidateId)
	{
		$collection = JbCandidateEducation::where('jb_candidate_id',$candidateId)->get();
		return [
			'list'=>$collection
		];
	}

	function candidateEductionGet($id)
	{
		return [
			'data'=>JbCandidateEducation::find($id)
		];
	}

	function candidateSkillFetch($candidateId)
	{
		$collection = JbCandidateSkill::where('jb_candidate_id',$candidateId)->get();
		return [
			'list'=>$collection
		];
	}

	function candidateSkillGet($id)
	{
		return [
			'data'=>JbCandidateSkill::find($id)
		];
	}

	function candidateWorkExperienceFetch($candidateId)
	{
		return [
             'list'=>JbCandidateWorkExperience::where('jb_candidate_id',$candidateId)->get()
		];
	}

	function candidateWorkExperienceGet($id)
	{
		return [
			'data'=>JbCandidateWorkExperience::find($id)
		];
	}

	function filterFetch()
	{
		return [
			'list'=>JbFilter::all()
		];
	}

	function userCandidateGet($userId)
	{
		$query = JbCandidate::where('user_id',$userId)->first();
		return [
			'data'=>$query
		];
	}

	function candidateDocumentFetch($userId)
	{
		return [
			'list'=>JbCandidateDocument::where('user_id',$userId)->get()
		];
//			'list'=>JbCandidateDocument::where('user_id',$user_id)->get()
	}

	function candidateDocumentGet($id)
	{
		return [
			'data'=>JbCandidateDocument::find($id)
		];
	}

	function settingsFetch()
	{
		return [
			'list'=>JbSetting::all()
		];
	}

	function settingsGet($id)
	{
		return [
			'data'=>JbSetting::find($id)
		];
	}

	function settingsGetByName($name)
	{
		return [
			'data'=>JbSetting::where('name',$name)->first()
		];
	}

	function candidateJobGet($id)
	{
		$model = JbCandidateJob::find($id);
		return [
			'data'=>$model
		];
	}
}