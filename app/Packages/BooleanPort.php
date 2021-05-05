<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/10/2020
 * Time: 12:23 PM
 */

namespace App\Packages;


interface BooleanPort
{

    function hasJobApplication($userId,$jobId);
    function hasApplication($jobId,$candidateId,$userId);
    function applicationIsInProgress();
    function hasCv($userId);
    function hasNotification($userId);
    function notificationIsActive($userId);
    function notificationIsInactive($userId);
    function rolePermissionExists($role_id,$permission_id);

    function userAccountExists($email);
    function passwordMatches();

    function settingExists($name);

}