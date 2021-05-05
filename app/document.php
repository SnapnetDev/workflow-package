<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    //
    protected $table='documents';
    protected $fillable= ['document', 'type_id','user_id', 'last_mod_id'];

    public function documenttype(){
    	return $this->belongsTo('App\DocumentType','type_id')->withDefault();
    }

    public function user(){
    	return $this->belongsTo('App\User','user_id')->withDefault();
    }
}
