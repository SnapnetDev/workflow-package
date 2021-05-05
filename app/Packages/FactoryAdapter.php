<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/13/2020
 * Time: 12:01 PM
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
use App\User;

class FactoryAdapter implements FactoryPort
{

    function roleFactory()
    {
        // TODO: Implement roleFactory() method.
        return [
            'factory'=>(new JbRole)
        ];
    }

    function permissionFactory()
    {
        // TODO: Implement permissionFactory() method.
        return [
            'factory'=>(new JbPermission)
        ];
    }

    function rolePermissionFactory()
    {
        // TODO: Implement rolePermissionFactory() method.
        return [
            'factory'=>(new JbRolePermission)
        ];
    }

    function userFactory()
    {
        // TODO: Implement userFactory() method.
        return [
            'factory'=>(new User)
        ];
    }

	function candidateFactory()
	{
		// TODO: Implement candidateFactory() method.
		return [
			'factory'=>(new JbCandidate)
		];
	}

	function disciplineFactory()
	{
		// TODO: Implement disciplineFactory() method.
		return [
			'factory'=>(new JbDisciplines)
		];
	}

	function documentFactory()
	{
		// TODO: Implement documentFactory() method.
		return [
			'factory'=>(new JbCandidateDocument)
		];
	}

	function candidateJobFactory()
	{

		return [
			'factory'=>(new JbCandidateJob)
		];
	}

	function candidateEducationFactory()
	{
		return [
			'factory'=>(new JbCandidateEducation)
		];
	}

	function candidateSkillFactory()
	{
		return [
			'factory'=>(new JbCandidateSkill)
		];
	}

	function candidateWorkExperienceFactory()
	{
		return [
			'factory'=>(new JbCandidateWorkExperience)
		];
	}

	function filterFactory()
	{
		return [
			'factory'=>( new JbFilter )
		];
	}

	function settingFactory()
	{
		return [
			'factory'=>( new JbSetting )
		];
	}
}
