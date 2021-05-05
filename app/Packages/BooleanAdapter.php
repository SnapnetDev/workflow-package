<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/12/2020
 * Time: 1:18 PM
 */

namespace App\Packages;


use App\JbNotification;
use App\JbRolePermission;
use App\JbSetting;
use App\Models\JbCandidate;
use App\Models\JbCandidateJob;
use App\User;
use Illuminate\Http\Request;

class BooleanAdapter implements BooleanPort
{

    private $repoPort = null;
    private $request = null;


    function __construct(RepoPort $repoPort,Request $request)
    {
        $this->repoPort = $repoPort;
        $this->request = $request;
    }

    function hasApplication($jobId,$candidateId,$userId)
    {

    	$modelCheck = JbCandidate::where('user_id',$userId)->count();

    	if ($modelCheck > 0){
		    $check = JbCandidateJob::where('jb_job_id',$jobId)->where('jb_candidate_id',$candidateId)->count();
		    return ($check > 0);
	    }else{
    		return false;
	    }

//        $candidate = $this->repoPort->getCandidate($userId);
//        if (is_null($candidate['data'])){
//        	return false;
//        }else{
//        	return true;
//        }

    }

    function applicationIsInProgress()
    {
        // TODO: Implement applicationIsInProgress() method.
        return session()->has('jobId');
    }

    function hasCv($userId)
    {
        // TODO: Implement hasCv() method.
        $check = JbCandidate::where('user_id',$userId)->count();
        return ($check >= 1);
    }

    function hasNotification($userId)
    {

        $check = JbNotification::where('user_id',$userId)->count();
        return ($check > 0);
    }

    function notificationIsActive($userId)
    {

        $check = JbNotification::where('user_id',$userId)->first();
        return !is_null($check) && $check->status == 1;

    }

    function notificationIsInactive($userId)
    {

        $check = JbNotification::where('user_id',$userId)->first();
        return !is_null($check) && $check->status == 0;
    }

    function rolePermissionExists($role_id, $permission_id)
    {

        return (JbRolePermission::where('jb_role_id',$role_id)->where('jb_permission_id',$permission_id)->count() > 0);
    }

    function userAccountExists($email)
    {

        $check = User::where('email',$email)->count();
        return ($check > 0);

    }

    function passwordMatches()
    {
        $password1 = $this->request->password1;
        $password2 = $this->request->password2;

        return ($password1 == $password2 && !empty($password2));

    }

	function hasJobApplication($userId, $jobId)
	{
		// TODO: Implement hasJobApplication() method.
		$candidate = $this->repoPort->getCandidate($userId);
		if (is_null($candidate['data'])){
			return false;
		}else{
			$check = JbCandidateJob::where('jb_job_id',$jobId)->where('jb_candidate_id',$candidate['data']->id)->count();
			return ($check > 0);
		}
	}

	function settingExists($name)
	{
		return (JbSetting::where('name',$name)->count() > 0);
	}
}