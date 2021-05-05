<?php
/**
 * Created by PhpStorm.
 * User: NnamdiAlexanderAkamu
 * Date: 6/10/2020
 * Time: 12:53 PM
 */

namespace App\Traits;


use App\JbSetting;

trait SettingTrait
{

	//name and value

	function getSetting($name){
       if ($this->hasSetting($name)){
       	return (new JbSetting)->newQuery()->where('name',$name)->first()->value;
       }else{
       	return null;
       }
	}

	function hasSetting($name){
		return (new JbSetting)->newQuery()->where('name',$name)->exists();
	}

	function saveSetting($name,$value){
		if ($this->hasSetting($name)){
           $obj = (new JbSetting)->newQuery()->where('name',$name)->first();
           $obj->value = $value;
           $obj->save();
			return [
				'message'=>'Setting saved',
				'error'=>false
			];
		}else{
			$obj = new JbSetting;
			$obj->name = $name;
			$obj->value = $value;
			$obj->save();
			return [
				'message'=>'New Setting created',
				'error'=>false
			];
		}
	}

	function removeSetting($name){
		if ($this->hasSetting($name)){
			$obj = (new JbSetting)->newQuery()->where('name',$name)->delete();
			return [
				'message'=>'Setting removed',
				'error'=>false
			];
		}else{
			return [
				'message'=>'Setting does not exist!',
				'error'=>true
			];
		}
	}


}