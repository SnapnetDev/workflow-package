<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/13/2020
 * Time: 10:48 PM
 */

namespace App\Packages;


use App\JbCandidateDocument;
use App\JbDisciplines;
use App\JbFilter;
use App\JbPermission;
use App\JbRolePermission;
use App\JbSetting;
use App\Models\JbCandidateEducation;
use App\Models\JbCandidateSkill;
use App\Models\JbCandidateWorkExperience;

class GarbageAdapter implements GarbagePort
{


    function rolePermissionGarbage($role_id)
    {
        // TODO: Implement rolePermissionGarbage() method.
        $collection = JbRolePermission::where('jb_role_id',$role_id)->get();

        foreach ($collection as $k=>$model){
          $model->delete();
        }

        return [
            'message'=>'Role - permission removed',
            'error'=>false,
            'data'=>null
        ];

    }

    function permissionGarbage($permission_id)
    {
        // TODO: Implement permissionGarbage() method.
        $model = JbPermission::find($permission_id);
        $model->delete();
        return [
            'message'=>'Permission removed.',
            'error'=>false,
            'data'=>$model
        ];
    }

	function cancelSession()
	{
		// TODO: Implement cancelSession() method.
		session()->forget('jobId');
		return [
			'message'=>'Job application session cancelled',
			'error'=>false,
			'data'=>null
		];
	}

	function disciplineGarbage($id)
	{
		// TODO: Implement disciplineGarbage() method.
		$model = JbDisciplines::find($id);
		$model->delete();
		return [
			'message'=>'Discipline removed',
			'data'=>$model,
			'error'=>false
		];

	}

	function documentGarbage($id)
	{
		$model = JbCandidateDocument::find($id);
		$model->delete();
		return [
			'message'=>'Document removed',
			'error'=>false,
			'data'=>$model
		];
	}

	function candidateEducationGarbage($id)
	{
		$model = JbCandidateEducation::find($id);
		$model->delete();
		return [
			'message'=>'Education removed',
			'error'=>false,
			'data'=>$model
		];
	}

	function candidateSkill($id)
	{
		$model = JbCandidateSkill::find($id);
		$model->delete();
		return [
			'message'=>'Skill removed',
			'error'=>false,
			'data'=>$model
		];

	}

	function candidateWorkExperienceGarbage($id)
	{
		$model = JbCandidateWorkExperience::find($id);
		$model->delete();
		return [
			'message'=>'Work Experience Removed.',
			'error'=>false,
			'data'=>$model
		];
	}

	function filterGarbage($id)
	{
		$model = JbFilter::find($id);
		$model->delete();
		return [
			'message'=>'Filter removed',
			'error'=>false,
			'data'=>$model
		];
	}

	function settingsGarbage($id)
	{
	  $model = JbSetting::find($id);
	  $model->delete();
	  return [
	  	'message'=>'Setting removed',
		'error'=>false,
		'data'=>$model
	  ];
	}
}