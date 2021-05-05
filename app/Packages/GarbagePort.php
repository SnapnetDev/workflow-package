<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/10/2020
 * Time: 12:20 PM
 */

namespace App\Packages;


interface GarbagePort
{


    function rolePermissionGarbage($role_id);
    function permissionGarbage($permission_id);
    function cancelSession();
    function disciplineGarbage($id);
    function documentGarbage($id);

    function candidateEducationGarbage($id);
    function candidateSkill($id);
    function candidateWorkExperienceGarbage($id);
    function filterGarbage($id);
    function settingsGarbage($id);

}