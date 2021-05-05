<?php

namespace App\Http\Controllers;

use App\JbSetting;
use App\Packages\Application\ApplicationPort;
use App\Packages\User\UserPort;
use App\Packages\Util;
use Auth;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    //

    private $userPort = null;
    private $applicationPort = null;


    function __construct(UserPort $userPort,ApplicationPort $applicationPort)
    {
        $this->userPort = $userPort;
        $this->applicationPort = $applicationPort;
    }



//    function handlePost($type){
//
//
//
//    }


    function handlePost($type,Request $request){

       if ($type == 'enable-notification'){

           $response = $this->applicationPort->enableNotification(Auth::user()->id);
           return redirect()->back()->with($response);

       }else if ($type == 'disable-notification'){

           $response = $this->applicationPort->disableNotification(Auth::user()->id);
           return redirect()->back()->with($response);

       }else if ($type == 'create-role'){

           $response = $this->applicationPort->roleCreate();
           return redirect()->back()->with($response);

       }else if ($type == 'update-role'){

           $response = $this->applicationPort->roleUpdate($request->id);
           return redirect()->back()->with($response);

       }else if ($type == 'create-permission'){

           $response = $this->applicationPort->permissionCreate();
           return redirect()->back()->with($response);

       }else if ($type == 'update-permission'){

           $response = $this->applicationPort->permissionUpdate($request->id);
           return redirect()->back()->with($response);

       }else if ($type == 'assign-role'){

          $response = $this->applicationPort->userAssignRole($request->user_id);
          return redirect()->back()->with($response);

       }else if ($type == 'update-role-permission'){

           $role_id = $request->role_id;
           $permissions_id = $request->permissions_id;

           $response = $this->applicationPort->rolePermissionUpdate($role_id,$permissions_id);

           return redirect()->back()->with($response);

       }else if ($type == 'delete-permission'){

           //permissionDelete
           $response = $this->applicationPort->permissionDelete($request->id);
           return redirect()->back()->with($response);


       }else if ($type == 'user-update'){
           $response = $this->applicationPort->userUpdate($request->id);
           return redirect()->back()->with($response);
       }else if ($type == 'user-create'){

           $response = $this->applicationPort->userCreate();

           return redirect()->back()->with($response);

       }else if ($type == 'candidate-create'){

       	   $response = $this->applicationPort->candidateCreate();

       	   return redirect(route('app.get',['preview-candidate']) . '?id=' . $response['data']->id)->with($response);

       }else if ($type == 'candidate-update'){

       	  $id = $request->id;
       	  $response = $this->applicationPort->candidateUpdate($id);

          if ($this->applicationPort->applicationIsInProgress()){
	          return redirect(route('app.get',['preview-candidate']) . '?id=' . $id)->with($response);
          }else{
	          return redirect()->back()->with($response);
          }


       }else if ($type == 'candidate-job-apply'){

       	 $pageIntent = session()->get('pageIntent');

       	 if (Auth::check()){

	         $response = $this->applicationPort->candidateJobApply();

	         if ($pageIntent == 'show'){
		        return redirect()->back()->with($response);
	        }else if ($pageIntent == 'preview'){
		         return redirect(route('home.main'))->with($response); //home.main
	        }
         }else{
            dd('Please login! ( This will never happen ). ');
         }

       }else if ($type == 'document-create'){

       	  $response = $this->applicationPort->documentCreate();
       	  return redirect()->back()->with($response);

       }else if ($type == 'document-update'){

       	 $response = $this->applicationPort->documentUpdate($request->id);
       	 return redirect()->back()->with($response);

       }else if ($type == 'document-delete'){

       	 $response = $this->applicationPort->documentDelete($request->id);
       	 return redirect()->back()->with($response);

       }else if ($type == 'education-create'){

       	  $response = $this->applicationPort->candidateEducationCreate();
       	  return redirect()->back()->with($response);

       }else if ($type == 'education-update'){

       	  $response = $this->applicationPort->candidateEducationUpdate($request->id);
       	  return redirect()->back()->with($response);

       }else if ($type == 'education-delete'){

       	   $response = $this->applicationPort->candidateEducationDelete($request->id);
       	   return redirect()->back()->with($response);

       }else if ($type == 'skill-create'){

       	   $response = $this->applicationPort->candidateSkillCreate();
       	   return redirect()->back()->with($response);

       }else if ($type == 'skill-update'){
	       $response = $this->applicationPort->candidateSkillUpdate($request->id);
	       return redirect()->back()->with($response);

       }else if ($type == 'skill-delete'){
	       $response = $this->applicationPort->candidateSkillDelete($request->id);
	       return redirect()->back()->with($response);


       }else if ($type == 'work-experience-create'){

       	  $response = $this->applicationPort->candidateWorkExperienceCreate();
       	  return redirect()->back()->with($response);

       }else if ($type == 'work-experience-update'){

       	  $response = $this->applicationPort->candidateWorkdExperienceUpdate($request->id);
       	  return redirect()->back()->with($response);

       }else if ($type == 'work-experience-delete'){

       	  $response = $this->applicationPort->candidateWorkExperienceDelete($request->id);
       	  return redirect()->back()->with($response);

       }else if ($type == 'filter-create'){

       	 $response = $this->applicationPort->filterCreate();
       	 return redirect()->back()->with($response);

       }else if ($type == 'filter-update') {

	       $response = $this->applicationPort->filterUpdate($request->id);

	       return redirect()->back()->with($response);

       }else if ($type == 'filter-delete'){

       	  $response = $this->applicationPort->filterDelete($request->id);
       	  return redirect()->back()->with($response);

       }else if ($type == 'setting-create'){

       	   $name = request()->get('name');
       	   $value = request()->get('value');
       	   $response = (new JbSetting)->saveSetting($name, $value);
//       	  $response = $this->applicationPort->settingCreate();
       	  return redirect()->back()->with($response);

       }else if ($type == 'setting-update'){

	       $name = request()->get('name');
	       $value = request()->get('value');
	       $response = (new JbSetting)->saveSetting($name, $value);
//       	  $response = $this->applicationPort->settingCreate();
	       return redirect()->back()->with($response);
//
//	       $response = $this->applicationPort->settingUpdate($request->id);
//          return redirect()->back()->with($response);

       }else if ($type == 'setting-delete'){

//	       $response = $this->applicationPort->settingDelete($request->id);
	       $name = request()->get('name');
	       $response = (new JbSetting)->removeSetting($name);
	       return redirect()->back()->with($response);

       }else if ($type == 'update-applicant-status'){

       	  $response = $this->applicationPort->candidateJobUpdateStatus($request->ids);
       	  return redirect()->back()->with($response);

       }else{
       	 return Util::runCommand($this, $type, $request);
       }


    }





//    function updateFolder(){
//    	return (new CandidateFolderInteractor)->updateFolder();
//    }
//
//    function updateCandidateFolder(){
//    	return (new CandidateFolderInteractor)->updateCandidateFolder();
//    }


}
