<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 3/10/2020
 * Time: 9:51 AM
 */

namespace App\Packages;


use App\Models\JbCandidate;
use Illuminate\Http\Request;

class UploadAdapter implements UploadPort
{

	private $request = null;

	function __construct(Request $request)
	{
		$this->request = $request;
	}

	function candidateUploadCv(JbCandidate $jbCandidate)
	{

		if ($this->request->file('cv_upload')){
			$ext = $this->request->file('cv_upload')->getClientOriginalExtension();
//			dd($ext);
			$file = $this->request->file('cv_upload')->storeAs('cv_upload', md5(uniqid()) . '.' . $ext,['disk'=>'uploads']);
//			dd($file);
			$jbCandidate->cv_upload = $file; // $this->request->file('cv_upload')->store('cv_upload',['disk'=>'uploads']);
		}

		if ($this->request->file('profile_photo')){
			$jbCandidate->profile_photo = $this->request->file('profile_photo')->store('profile_photo',['disk'=>'uploads']);
		}

		if ($this->request->file('profile_video')){
			$jbCandidate->profile_video = $this->request->file('profile_video')->store('profile_video',['disk'=>'uploads']);
		}

		//profile_video

		return $jbCandidate;

	}



}