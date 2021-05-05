<?php


namespace App\Util;


use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Schema;

class MigGen
{

    static function getTablesFromDb(){
        $tables = DB::select('show tables');
        return $tables; //Tables_in_mrecruit_db
    }

    static function getFieldsFromTable($tableName){

        $cols = \Schema::getColumnListing($tableName); //->getColumnListing($tableName);

        $cols = array_diff($cols,['id','created_at','updated_at']);

        return [
            'tableName'=>$tableName,
            'fields'=>$cols,
            'className'=>'table_' . $tableName . '_class_' . uniqid()
        ];

//        return $cols;

    }

}