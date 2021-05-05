<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/12/2020
 * Time: 11:31 PM
 */

namespace App\Packages\Application;


use App\Packages\BooleanPort;
use App\Packages\DataPort;
use App\Packages\FactoryPort;
use App\Packages\GarbagePort;
use App\Packages\NotificationPort;
use App\Packages\RepoPort;
use Auth;
use Illuminate\Http\Request;

class ApplicationAdapter implements ApplicationPort
{

    private $booleanPort = null;
    private $repoPort = null;
    private $dataPort = null;
    private $factoryPort = null;
    private $request = null;
    private $garbagePort = null;
    private $notificationPort = null;

    function __construct(
        BooleanPort $booleanPort,
        RepoPort $repoPort,
        DataPort $dataPort,
        FactoryPort $factoryPort,
        Request $request,
        GarbagePort $garbagePort,
	    NotificationPort $notificationPort
    ) {
        $this->booleanPort = $booleanPort;
        $this->repoPort = $repoPort;
        $this->dataPort = $dataPort;
        $this->factoryPort = $factoryPort;
        $this->request = $request;
        $this->garbagePort = $garbagePort;
        $this->notificationPort = $notificationPort;
    }

    /***
     * module: Notification
     */
    function enableNotification($userId)
    {
        // TODO: Implement enableNotification() method.
        $this->createNotification($userId);

        return $this->dataPort->enableNotification($userId);
    }

    function createNotification($userId)
    {
        // TODO: Implement createNotification() method.
        if (!$this->booleanPort->hasNotification($userId)) {
            $this->dataPort->createNotification($userId);
        }
    }

    function disableNotification($userId)
    {
        // TODO: Implement disableNotification() method.
        $this->createNotification($userId);

        return $this->dataPort->disableNotification($userId);
    }

    /***
     * module: Role
     */

    function roleFetch()
    {
        // TODO: Implement roleFetch() method.
        return $this->repoPort->roleFetch();
    }

    function roleCreate()
    {
        // TODO: Implement roleCreate() method.
        $factory = $this->factoryPort->roleFactory();

        return $this->dataPort->roleCreate($factory['factory']);

    }

    function roleUpdate($id)
    {
        // TODO: Implement roleUpdate() method.
        $model = $this->repoPort->roleGet($id);

        return $this->dataPort->roleUpdate($model['data']);
    }


    /***
     * module: Permission
     */

    function permissionFetch()
    {
        // TODO: Implement permissionFetch() method.
        return $this->repoPort->permissionFetch();
    }

    function permissionCreate()
    {
        // TODO: Implement permissionCreate() method.
        $factory = $this->factoryPort->permissionFactory();

        return $this->dataPort->permissionCreate($factory['factory']);
    }

    function permissionUpdate($id)
    {
        // TODO: Implement permissionUpdate() method.
        $model = $this->repoPort->permissionGet($id);

        return $this->dataPort->permissionUpdate($model['data']);
    }

    function roleGet($id)
    {
        // TODO: Implement roleGet() method.
        return $this->repoPort->roleGet($id);
    }

    function permissionGet($id)
    {
        // TODO: Implement permissionGet() method.
        return $this->repoPort->permissionGet($id);
    }

    function userAssignRole($userId)
    {
        // TODO: Implement userAssignRole() method.
        $user = $this->repoPort->userGet($userId);

        return $this->dataPort->userAssignRole($user);

    }

    function rolePermissionUpdate($role_id, $permissions_id)
    {
        // TODO: Implement rolePermissionUpdate() method.
        if (is_array($permissions_id)) {

            $this->garbagePort->rolePermissionGarbage($role_id);

            foreach ($permissions_id as $k => $permission_id) {

//              if ($this->booleanPort->rolePermissionExists($role_id,$permission_id)){

//              }

                $factory = $this->factoryPort->rolePermissionFactory();
                $this->dataPort->rolePermissionCreate($factory['factory'], $role_id, $permission_id);
            }

            return [
                'message' => 'Role - Permission updated',
                'error' => false,
                'data' => null,
            ];

        } else {
            return [
                'message' => 'Invalid selection!',
                'error' => true,
                'data' => null,
            ];
        }
    }

    function permissionDelete($id)
    {
        // TODO: Implement permissionDelete() method.
        return $this->garbagePort->permissionGarbage($id);
    }

    function userFetch()
    {
        // TODO: Implement userFetch() method.
        return $this->repoPort->userFetch();
    }

    function candidateFetch()
    {
        // TODO: Implement candidateFetch() method.
        return $this->repoPort->candidateFetch();

    }

    function userUpdate($id)
    {

        $user = $this->repoPort->userGet($id);

        return $this->dataPort->updateUserProfile($user['data']);
    }

    function userCreate()
    {
        if (!$this->booleanPort->userAccountExists($this->request->email)) {

            if ($this->booleanPort->passwordMatches()) {

                $factory = $this->factoryPort->userFactory();

                return $this->dataPort->createUserProfile($factory['factory']);

            } else {

                return [
                    'message' => 'Invalid password!',
                    'error' => true,
                    'data' => null,
                ];
            }

        } else {

            return [
                'message' => 'An account with this E-mail already exists!',
                'error' => true,
                'data' => null,
            ];
        }
    }

	function candidateUpdate($candidateId)
	{
		// TODO: Implement candidateUpdate() method.
       $model = $this->repoPort->candidateGet($candidateId);
       return $this->dataPort->candidateUpdate($model['data']);
	}

	function candidateCreate()
	{
		// TODO: Implement candidateCreate() method.
		$model = $this->factoryPort->candidateFactory();
		return $this->dataPort->candidateCreate($model['factory']);
	}

	function disciplineFetch()
	{
		// TODO: Implement disciplineFetch() method.
		return $this->repoPort->disciplineFetch();
	}

	function disciplineCreate()
	{
		// TODO: Implement disciplineCreate() method.
		$model = $this->factoryPort->disciplineFactory();
		return $this->dataPort->disciplineCreate($model['factory']);

	}

	function disciplineUpdate($id)
	{

		$model = $this->repoPort->candidateGet($id);
		return $this->dataPort->disciplineUpdate($model['data']);

	}

	function disciplineDelete($id)
	{
		return $this->garbagePort->disciplineGarbage($id);
	}

	function candidateGet($id)
	{
		return $this->repoPort->candidateGet($id);
	}


	function applicationIsInProgress()
	{
		return $this->booleanPort->applicationIsInProgress();

	}

	function cancelApplication()
	{
		return $this->garbagePort->cancelSession();
	}

	function candidateJobApply()
	{

		$jobId = $this->request->jb_job_id;
		$candidateId = $this->request->jb_candidate_id;
		$userId = Auth::user()->id;
		$factory = $this->factoryPort->candidateJobFactory();

        if (!$this->booleanPort->hasApplication($jobId, $candidateId, $userId)){

        	//send notification here ....
//	        $this->notificationPort->notifyAdmin($jobId,$candidateId,$userId);


	        $ref = $this;
        	$response = $this->dataPort->candidateJobApply($factory['factory'],function() use ($ref,$jobId,$candidateId,$userId){
        		$ref->notificationPort->notifyAdmin($jobId, $candidateId, $userId);
		        $ref->garbagePort->cancelSession();
	        });

	        return $response;

        }else{

	        $this->garbagePort->cancelSession();

        	return [
           	 'message'=>'You have already applied for this job',
	         'error'=>true,
	         'data'=>null
           ];

        }

	}

	function documentFetch()
	{
		$userId = Auth::user()->id;
		return $this->repoPort->documentFetch($userId);
	}

	function documentUpdate($documentId)
	{
		$model = $this->repoPort->documentGet($documentId);
		return $this->dataPort->documentUpdate($model['data']);
	}

	function documentCreate()
	{
		$factory = $this->factoryPort->documentFactory();
		return $this->dataPort->documentCreate($factory['factory']);
	}

	function documentDelete($documentId)
	{
      return $this->garbagePort->documentGarbage($documentId);
	}

	function candidateJobFetch()
	{
		if ($this->request->filled('jobId')){
			$jobId = $this->request->jobId;
			return $this->repoPort->candidateJobFetchByJob($jobId);
		}else{
			return $this->repoPort->candidateJobFetchAll();
		}
	}


	function candidateEducationCreate()
	{
		$factory = $this->factoryPort->candidateEducationFactory();
//		dd($factory);
		return $this->dataPort->candidateEductionCreate($factory['factory']);
	}

	function candidateEducationUpdate($id)
	{
		$model = $this->repoPort->candidateEductionGet($id);
		return $this->dataPort->candidateEducationUpdate($model['data']);

	}

	function candidateEducationDelete($id)
	{
		return $this->garbagePort->candidateEducationGarbage($id);
	}


	function candidateSkillCreate()
	{
		$factory = $this->factoryPort->candidateSkillFactory();
		return $this->dataPort->candidateSkillCreate($factory['factory']);
	}

	function candidateSkillUpdate($id)
	{
	  $model = $this->repoPort->candidateSkillGet($id);
	  return $this->dataPort->candidateSkillUpdate($model['data']);
	}

	function candidateSkillDelete($id)
	{
		return $this->garbagePort->candidateSkill($id);
	}

	function candidateWorkExperienceCreate()
	{
		$factory = $this->factoryPort->candidateWorkExperienceFactory();
		return $this->dataPort->candidateWorkExperienceCreate($factory['factory']);
	}

	function candidateWorkdExperienceUpdate($id)
	{
		$model = $this->repoPort->candidateWorkExperienceGet($id);
//		dd($model);
		return $this->dataPort->candidateWorkExperienceUpdate($model['data']);
	}


	function candidateWorkExperienceDelete($id)
	{
		return $this->garbagePort->candidateWorkExperienceGarbage($id);
	}

	function filterCreate()
	{
		$factory = $this->factoryPort->filterFactory();
		return $this->dataPort->filterCreate($factory['factory']);
	}

	function filterUpdate($id)
	{
		$model = $this->repoPort->filterGet($id);
		return $this->dataPort->filterUpdate($model['data']);
	}

	function settingCreate()
	{
		if (!$this->booleanPort->settingExists($this->request->name)){
			$factory = $this->factoryPort->settingFactory();
			return $this->dataPort->settingCreate($factory['factory']);
		}else{
			return [
				'message'=>'Setting already created',
				'error'=>true,
				'data'=>null
			];
		}
	}

	function settingUpdate($id)
	{
		$model = $this->repoPort->settingsGet($id);
		return $this->dataPort->settingUpdate($model['data']);
	}

	function settingDelete($id)
	{
	    return $this->garbagePort->settingsGarbage($id);
	}

	function filterDelete($id)
	{
		return $this->garbagePort->filterGarbage($id);
	}

	function candidateJobUpdateStatus($ids)
	{
		$response = [];
		if (is_array($ids)){

//			dd($ids);

			foreach ($ids as $k=>$v){
				$model = $this->repoPort->candidateJobGet($v);
//				dd($v);
				$response[] = $this->dataPort->candidateJobUpdateStatus($model['data']);
			}

		}
		return [
			'message'=>'Status updated.',
			'error'=>false,
			'data'=>$response
		];
	}

}