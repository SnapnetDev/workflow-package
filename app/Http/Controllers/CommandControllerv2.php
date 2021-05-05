<?php

namespace App\Http\Controllers;

use App\Interactors\CandidateFolderInteractor;
use App\Models\JbCandidate;
use App\Traits\CommandTrait;

class CommandControllerv2 extends Controller
{
    //
	use CommandTrait;


	function test3(){
		return 'Test3.';
	}


	function pushToHcm(){
		//read payload info
		dd(request()->all());
	}


	function updateCandidateJobStatusCollection(){
		$response = (new JbCandidate)->updateCandidateJobStatusCollection();
		return redirect()->back()->with($response);
	}



	function updateFolder(){
		$response = (new CandidateFolderInteractor)->updateFolder();
		return redirect()->back()->with($response);
	}

	function updateCandidateFolder(){
		$response = (new CandidateFolderInteractor)->updateCandidateFolder();
		return redirect()->back()->with($response);
	}


}
