<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 3/10/2020
 * Time: 9:50 AM
 */

namespace App\Packages;


use App\Models\JbCandidate;

interface UploadPort
{

	function candidateUploadCv(JbCandidate $jbCandidate);


}