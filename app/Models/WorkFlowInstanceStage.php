<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkFlowInstanceStage extends Model
{
    use HasFactory;

    protected $fillable = ['workflow_instance_id','workflow_stage_id','notes','status','action_owner'];

    static function getFactory(){
        return new self;
    }

    static function createWorkFlowInstanceStage($data){

      $obj = self::getFactory();

      $obj = $obj->create([
          'workflow_instance_id'=>$data['workflow_instance_id'],
          'workflow_stage_id'=>$data['workflow_stage_id'],
          'notes'=>$data['notes'],
          'status'=>$data['status']
      ]);

      return $obj;

    }

    static function updateStage($id){

        $record = self::query()->where('id',$id);
        $data = request()->validate(['notes'=>'required','status'=>'required']);
        $record = $record->update($data);

        return $record;

    }



}
