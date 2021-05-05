<?php
namespace App\Packages\Skill;

use App\Models\JbSkill;
use App\Packages\Crud\CrudPort;
use Auth;
use Illuminate\Http\Request;

class SkillAdapter implements CrudPort{



      private $request = null;

      function __construct(Request $request)
      {
          $this->request = $request;
      }

      function getList()
      {
        if ($this->request->filled('ds')){
           $collection = JbSkill::where('jb_discipline_id',$this->request->ds)->orderBy('id','desc')->paginate(5);
        }else{
           $collection = JbSkill::orderBy('id','desc')->paginate(5);
        }
        return [
            'list'=>$collection
        ];
      }

      private function getModel(){
        $id = $this->request->id;
        $model = JbSkill::find($id);
        return $model;
      }

      private function updateInput($model){
          $model->name = $this->request->name;
          $model->jb_discipline_id = $this->request->jb_discipline_id;
          $model->created_by = Auth::user()->id;
      }

      function getItem($id)
      {
        return [
            'data'=>JbSkill::find($id)
        ];
      }

      function create()
      {
        $model = new JbSkill;
        $this->updateInput($model);
        $model->save();
        return [
            'message'=>'Skill added',
            'data'=>$model
        ];
      }

      function update()
      {
        $model = $this->getModel();
        $this->updateInput($model);
        $model->save();
        return [
            'message'=>'Skill saved',
            'data'=>$model
        ];
      }

      function delete()
      {
        $model = $this->getModel();
        $model->delete();
        return [
            'message'=>'Skill removed',
            'data'=>$model
        ];
      }

      function getCount()
      {
         return [
             'count'=>JbSkill::count()
         ];
      }


}
