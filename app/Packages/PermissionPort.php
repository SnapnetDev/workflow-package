<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/19/2020
 * Time: 1:59 PM
 */

namespace App\Packages;


interface PermissionPort
{


	function hasPermission($constant);

}