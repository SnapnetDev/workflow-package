<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/10/2020
 * Time: 12:07 PM
 */

namespace App\Packages;


use App\JbCandidateDocument;
use App\JbDisciplines;
use App\JbFilter;
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

interface DataPort
{

    function submitApplication();
    function endCurrentApplication();


    function createNotification($userId);
    function enableNotification($userId);
    function disableNotification($userId);
    function markAsSeen($userId);
    function markAsUnSeen($userId);

    function roleCreate(JbRole $jbRole);
    function roleUpdate(JbRole $jbRole);

    function permissionCreate(JbPermission $jbPermission);
    function permissionUpdate(JbPermission $jbPermission);

    function userAssignRole(User $user);
    function updateUserProfile(User $user);
    function createUserProfile(User $user);

    function rolePermissionCreate(JbRolePermission $jbRolePermission,$role_id,$permission_id);

    function candidateCreate(JbCandidate $jbCandidate);
    function candidateUpdate(JbCandidate $jbCandidate);

    function jobCreate(JbJob $jbJob);
    function jobUpdate(JbJob $jbJob);
    function disciplineCreate(JbDisciplines $jbDisciplines);
    function disciplineUpdate(JbDisciplines $jbDisciplines);

    function documentCreate(JbCandidateDocument $jbCandidateDocument);
    function documentUpdate(JbCandidateDocument $jbCandidateDocument);
    function candidateJobApply(JbCandidateJob $candidateJob, callable $callback=null);

	function candidateEductionCreate(JbCandidateEducation $jbCandidateEducation);
	function candidateEducationUpdate(JbCandidateEducation $jbCandidateEducation);

	function candidateSkillCreate(JbCandidateSkill $jbCandidateSkill);
	function candidateSkillUpdate(JbCandidateSkill $jbCandidateSkill);

	function candidateWorkExperienceCreate(JbCandidateWorkExperience $jbCandidateWorkExperience);
	function candidateWorkExperienceUpdate(JbCandidateWorkExperience $jbCandidateWorkExperience);

	function filterCreate(JbFilter $jbFilter);
	function filterUpdate(JbFilter $jbFilter);

	function settingCreate(JbSetting $jbSetting);
	function settingUpdate(JbSetting $jbSetting);

	function candidateJobUpdateStatus(JbCandidateJob $jbCandidateJob);








}