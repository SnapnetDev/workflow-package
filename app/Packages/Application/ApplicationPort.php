<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/12/2020
 * Time: 11:24 PM
 */

namespace App\Packages\Application;


interface ApplicationPort
{

    function enableNotification($userId);
    function disableNotification($userId);
    function createNotification($userId);

    function roleFetch();
    function roleGet($id);
    function roleCreate();
    function roleUpdate($id);

    function permissionFetch();
    function permissionGet($id);
    function permissionCreate();
    function permissionUpdate($id);
    function permissionDelete($id);

    function userAssignRole($userId);


    function rolePermissionUpdate($role_id,$permissions_id);

    function userFetch();
    function candidateFetch();
    function candidateGet($id);

    function userUpdate($id);
    function userCreate();

	function candidateUpdate($candidateId);
	function candidateCreate();

	function disciplineFetch();
	function disciplineCreate();
	function disciplineUpdate($id);
	function disciplineDelete($id);

	function applicationIsInProgress();
	function cancelApplication();
	function candidateJobApply();

	function documentFetch();
	function documentUpdate($documentId);
	function documentCreate();
	function documentDelete($documentId);

	function candidateJobFetch();

	function candidateEducationCreate();
	function candidateEducationUpdate($id);
	function candidateEducationDelete($id);

	function candidateSkillCreate();
	function candidateSkillUpdate($id);
	function candidateSkillDelete($id);

	function candidateWorkExperienceCreate();
	function candidateWorkdExperienceUpdate($id);
	function candidateWorkExperienceDelete($id);

	function filterCreate();
	function filterUpdate($id);
	function filterDelete($id);

	function settingCreate();
	function settingUpdate($id);
	function settingDelete($id);

	function candidateJobUpdateStatus($id);


}