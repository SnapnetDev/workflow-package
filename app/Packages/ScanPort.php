<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 3/3/2020
 * Time: 11:57 AM
 */

namespace App\Packages;


use App\Models\JbCandidate;
use Illuminate\Http\Request;

interface ScanPort
{

	 function scanPdf(Request $request,JbCandidate $jbCandidate);

}