<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JbRolePermission extends Model
{
    //
    protected $fillable = ['jb_role_id','jb_permission_id'];


    static function getFactory(){
        return new self;
    }

    static function fetch(){
        return self::getFactory()->newQuery();
    }



}
