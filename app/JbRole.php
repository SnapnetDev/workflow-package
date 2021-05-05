<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JbRole extends Model
{
    //
    protected $table = 'jb_roles';

    protected $fillable = ['name'];



    static function getFactory(){
        return new self;
    }

    static function fetch(){
        return self::getFactory()->newQuery();
    }

    static function getByName($name){
        return self::fetch()->where('name',$name);
    }


}
