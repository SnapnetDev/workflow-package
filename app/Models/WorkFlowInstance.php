<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkFlowInstance extends Model
{

    use HasFactory;

    protected $fillable = ['preview_url','workflow_id','module'];


    static function getFactory(){
        return new self;
    }

    static function fetch(){
        return self::getFactory()->newQuery();
    }

    static function triggerWorkFlow($data){//name,preview_url,workflow_id,module

        if (!WorkFlow::getByName($data['name'])->exists()){
            return  [
                'message'=>'Invalid workflow Name!',
                'error'=>true
            ];
        }

        $workFlowInstance = WorkFlow::getByName($data['name'])->first();

        $newData = [
            'preview_url'=>$data['preview_url'],
            'workflow_id'=>$workFlowInstance->id,
            'module'=>$data['module']
        ];

        $obj = self::getFactory();
        $obj = $obj->create($newData);

        $workFlowInstanceStage = self::createFirstStage($obj);

        return [

            'message'=>'Workflow process created',
            'error'=>false,
            'data'=>$obj,
            'workflow_instance_stage_data'=>$workFlowInstanceStage

        ];


    }

    static function createFirstStage($workFlowInstance){

        $workFlowId = $workFlowInstance->workflow_id;

        $stageQuery = WorkFlowStage::query()->where('workflow_id',$workFlowId)->where('position',1);

        $stageObject = $stageQuery->first();

        $newInstanceStage = WorkFlowInstanceStage::createWorkFlowInstanceStage([

            'workflow_instance_id'=>$workFlowInstance->id,
            'workflow_stage_id'=>$stageObject->id,
            'notes'=>'notes here ...',
            'status'=>0

        ]);

       return $newInstanceStage;

    }


    static function getNextStage($workFlowInstanceId){

      $workFlowInstanceStageQuery = WorkFlowInstanceStage::query()
          ->where('workflow_instance_id',$workFlowInstanceId)->orderBy('id','desc');
      $workflow_stage_id = $workFlowInstanceStageQuery->first()->workflow_stage_id;
      $stageQuery = WorkFlowStage::query()->where('id',$workflow_stage_id);
      $stageQueryObj = $stageQuery->first();

      if (WorkFlowStage::isLastStage($stageQueryObj->id)){
          return null; //indicates last stage
      }

      $workFlowId = $stageQueryObj->workflow_id;

      $nextPosition = $stageQueryObj->position + 1;

      $nextStageQuery = WorkFlowStage::query()->where('workflow_id',$workFlowId)->where('position',$nextPosition);

      return $nextStageQuery->first();

    }

    static function getPrevStage($workFlowInstanceId){

        $workFlowInstanceStageQuery = WorkFlowInstanceStage::query()
            ->where('workflow_instance_id',$workFlowInstanceId)->orderBy('id','desc');
        $workflow_stage_id = $workFlowInstanceStageQuery->first()->workflow_stage_id;
        $stageQuery = WorkFlowStage::query()->where('id',$workflow_stage_id);
        $stageQueryObj = $stageQuery->first();

        if (WorkFlowStage::stageExists($stageQueryObj->id)){
            return null;
        }

        if (!WorkFlowStage::isFirstStage($stageQueryObj->id)){
            return null; //indicates last stage
        }

        $workFlowId = $stageQueryObj->workflow_id;

        $prevPosition = $stageQueryObj->position - 1;

        $check = WorkFlowStage::query()->where('position',$prevPosition)->where('workflow_id',$workFlowId);

        if (!$check->exists()){
            return null;
        }

        $prevStageQuery = $check; // WorkFlowStage::query()->where('workflow_id',$workFlowId)->where('position',$prevPosition);

        return $prevStageQuery->first();

    }


}
