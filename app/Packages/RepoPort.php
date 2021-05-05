<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/10/2020
 * Time: 12:07 PM
 */

namespace App\Packages;


interface RepoPort
{

    function getMyNotification($userId);
    function getCandidate($userId);

    function roleFetch();
    function roleGet($id);

    function permissionFetch();
    function permissionGet($id);

    function userGet($id);
    function userCandidateGet($userId);
    function candidateFetch();
    function candidateGet($id);
    function userFetch();

    function rolePermissionFetch($role_id);
    function rolePermissionGet($id);
//    function candidateFetch();
    function disciplineFetch();
    function disciplineGet($id);
    function documentFetch($userId);
    function documentGet($id);

    function getActiveNotifications();

    function candidateJobFetchAll(callable $callback = null);
    function candidateJobFetchByJob($jobId);
    function candidateJobGet($id);

    function jobFetchValid();
    function jobFetchAll();

    function candidateEducationFetch($candidateId);
    function candidateEductionGet($id);

    function candidateSkillFetch($candidateId);
    function candidateSkillGet($id);


    function candidateWorkExperienceFetch($candidateId);
	function candidateWorkExperienceGet($id);

	function filterFetch();
	function filterGet($id);

	function candidateDocumentFetch($userId);
	function candidateDocumentGet($id);

	function settingsFetch();
	function settingsGet($id);
	function settingsGetByName($name);

//'list'=>JbCandidateDocument::where('user_id',$user_id)->get()




}