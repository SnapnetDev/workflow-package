<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 6/10/2020
 * Time: 10:22 AM
 */

namespace App\Traits;


use App\JbSetting;
use App\Models\JbCandidate;
use App\User;
use Auth;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Builder;

trait ThirdPartyHandShakeTrait
{

	function pushToHcMatrix(JbCandidate $jbCandidate){

		$url = $this->getHCMEndPoint();

		$client = new Client;
		$postData = [
			'name'=>$jbCandidate->name,
			'email'=>$jbCandidate->email,
			'phone_number'=>$jbCandidate->phone_number,
			'gender'=>$jbCandidate->gender,
			'_token'=>csrf_token()
		];



		$response = $client->request('POST',$url,[
			'form_params'=>($postData)
		]);

	}

	private function getHCMEndPoint(){
		return (new JbSetting)->getSetting('hcm_onboard_endpoint');
	}

	function autoLoginToHcRecruit(){

		//http://127.0.0.1:8000/pub-get/hcm-auto-login?token=$2y$10$CMOwtYlUmvUCIvFg4bSFYeJ2MqdKjBH3kvmrVL85CniHIqnpA7P9u&email=easymagic1@gmail.com

		$outsideToken = request()->get('token');
		if ($outsideToken == $this->getSecureToken()){

			if (request()->filled('email')){
				$email = request()->get('email');
				$userQuery = (new User)->newQuery()->whereHas('candidate',function(Builder $builder) use ($email){
					return $builder->where('email',$email);
				});

				if ($userQuery->exists()){
					$userObj = $userQuery->first();
                    \Illuminate\Support\Facades\Auth::loginUsingId($userObj->id);
					return redirect(route('home.main'))->with([
						'message'=>'Welcome to HC-Recruit.',
						'error'=>false
					]);
				}else{
					return redirect(route('home.main'))->with([
						'message'=>'User does not exists!',
						'error'=>true
					]);
				}

			}else{
				return redirect(route('home.main'))->with([
					'message'=>'Invalid E-mail',
					'error'=>true
				]);
			}

		}else{
			return redirect(route('home.main'))->with([
				'message'=>'Un-authorized',
				'error'=>true
			]);
		}

	}

	private function getSecureToken(){
      return (new JbSetting)->getSetting('token');
	}

	private function getHCMToken(){
		return (new JbSetting)->getSetting('hcm_token');
	}



}