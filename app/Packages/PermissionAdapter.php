<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/19/2020
 * Time: 2:00 PM
 */

namespace App\Packages;

use App\JbPermission;
use App\JbRolePermission;
use Auth;

class PermissionAdapter implements PermissionPort
{


	function hasPermission($constant)
	{
		$roleId = Auth::user()->jb_role_id;
//		$model = JbRole::find($roleId);
		$rolePermissions = JbRolePermission::where('jb_role_id',$roleId)->get();
		$found = false;
		foreach ($rolePermissions as $k=>$v){

			$permission = JbPermission::find($v->jb_permission_id);
			if ($permission->constant == $constant){
				$found = true;
				break;
			}
		}

		return $found;

	}

}