<?php

namespace App\Traits\ModelTraits;

trait CommentTrait{


    static function getFactory(){
        return new self;
    }

    static function fetch(){
        return self::getFactory()->newQuery();
    }


    static function getValidation(){
        return [
            'name'=>'required'
        ];
    }

    //gen-model-trait.stub

    static function createComment(){
        $data = request()->validate(self::getValidation());
        $obj = self::getFactory()->create($data);

        return [
            'message'=>'Record created.',
            'error'=>false
        ];
    }

    static function updateComment($id){
        $data = request()->validate(self::getValidation());
        $check = self::fetch()->where('id',$id);
        if (!$check->exists()){
            return [
                'message'=>'Invalid record!',
                'error'=>true
            ];
        }

        $record = $check->first();
        $record->update($data);
        return  [
            'message'=>'Record saved',
            'error'=>false
        ];

    }


    static function deleteComment($id){

        self::fetch()->where('id',$id)->delete();
        return [
            'message'=>'Record removed',
            'error'=>false
        ];

    }


}