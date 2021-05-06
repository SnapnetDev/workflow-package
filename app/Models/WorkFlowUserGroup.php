<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkFlowUserGroup extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','workflow_group_id'];
    protected $with = ['group'];

    function group(){
        return $this->belongsTo(WorkFlowGroup::class,'workflow_group_id');
    }

    function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    static function getValidation(){
        return [
            'workflow_group_id'=>'required',
            'user_id'=>'required'
        ];
    }

    static function getFactory(){
        return new self;
    }

    static function fetch(){
        return self::getFactory()->newQuery();
    }


    static function addGroupToUser(){

        $data = request()->validate(self::getValidation());

        //check for duplicates
        $check = self::fetch()->where('user_id',$data['user_id'])->where('workflow_group_id',$data['workflow_group_id']);
        if ($check->exists()){
            return [
                'message'=>'This group already exists for selected user',
                'error'=>true
            ];
        }

        $obj = self::getFactory()->create($data);
        return [
            'message'=>'New Group Added',
            'error'=>false
        ];
    }


    static function removeGroupMapping($id){
        $record = self::fetch()->where('id',$id);
        $record->delete();
        return [
            'message'=>'Selected group removed.',
            'error'=>false
        ];
    }

    static function removeGroupEmailMapping($email){
        
        $user = User::query()->where('email',$email);
        if (!$user->exists()){
            return  [
                'message'=>'Invalid email!',
                'error'=>true
            ];
        }

        $user = $user->first();
        //workflow_group_id
        $record = self::fetch()->where('user_id',$user->id);
        if (!$record->exists()){
            return  [
                'message'=>'Mapping already removed!',
                'error'=>true
            ];
        }

        $record->delete();

        return [
            'message'=>'Selected group-mapping removed.',
            'error'=>false
        ];

    }


}
