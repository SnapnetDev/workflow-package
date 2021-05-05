<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAppliedFor extends Model
{
    //
    protected $table='job_applied_fors';

    protected $fillable=[ 'user_id', 'job_id', 'status','resume_id','complete'];

    public function joblisting(){
    	return $this->belongsTo('App\joblisting','job_id')->withDefault();
    }
    public function user(){
    	return $this->belongsTo('App\User','user_id')->withDefault();
    }
    public function getResolveStatusAttribute(){
        if($this->complete==0){
            return '<span class="badge badge-warning">Application Incomplete</span>';
        }
    	switch ($this->status) {
    		case 0:
    			 return '<span class="badge badge-warning">Pending</span>';
    			# code...
    			break;
    		case 1:
    				 return '<span class="badge badge-success">Approved</span>';
    			# code...
    			break;
    		case 2:
    			# code...
    				 return '<span class="badge badge-danger">Rejected</span>';
    			break;
    	 
    		
    		default:
    			# code...
    			break;
    	}
    }
}
