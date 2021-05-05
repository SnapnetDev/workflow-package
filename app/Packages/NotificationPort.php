<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 2/12/2020
 * Time: 12:46 PM
 */

namespace App\Packages;


interface NotificationPort
{

    function notifyAdmin($jobId,$candidateId,$userId);
    function notifyTest();

}