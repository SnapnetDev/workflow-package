<?php
namespace App\Packages\Job;

use App\Models\JbJob;
use Auth;
use Illuminate\Http\Request;

class JobAdapter implements JobPort {

     private $request = null;

     function __construct(Request $request)
     {
       $this->request = $request;
     }

     function create()
     {
        $model = new JbJob;
        $model->code = uniqid();
        $this->updateModel($model);
        $model->save();
        return [
            'message'=>'New Job added',
            'data'=>$model
        ];
     }

     private function updateModel($model){
        $model->role = $this->request->role;
        $model->description = $this->request->description;
        $model->jb_recruitment_type_id = $this->request->jb_recruitment_type_id;

        $model->salary_start = $this->request->salary_start;
        $model->salary_stop = $this->request->salary_stop;

        $model->address = $this->request->address;
        $model->created_by = Auth::user()->id;
        $model->expiry_date = $this->request->expiry_date;
        $model->years_of_experience = $this->request->years_of_experience;
        $model->discipline_id = $this->request->discipline_id;
        $model->region_id = $this->request->region_id;

        $model->use_profile_video = ($this->request->filled('use_profile_video'))? 1 : 0;

     }

     function update(){
       $model = $this->getModel();
       $this->updateModel($model);
       $model->save();
       return [
           'message'=>'Job updated',
           'data'=>$model
       ];
     }

     private function getModel(){
        $id = $this->request->id;
        return JbJob::find($id);
     }

     function delete()
     {
       $model = $this->getModel();
       $model->delete();
       return [
           'message'=>'Job removed',
           'data'=>$model
       ];
     }

     function getList()
     {
        return [
            'list'=>JbJob::orderBy('id','desc')->paginate(7)
        ];
     }

     function getItem($id)
     {
       return [
           'data'=>JbJob::find($id)
       ];
     }

     function getCount()
     {
       return [
           'count'=>JbJob::count()
       ];
     }


}
