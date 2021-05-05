<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empPastEmp extends Model
{
    //
    protected $table='emp_past_emps';

    protected $fillable=['organization', 'role', 'emp_id', 'from', 'to', 'job_desc','job_level','address'];

    public function user(){
    	return $this->belongsTo('App\User','emp_id')->withDefault();
    }

    public function getJobLevelRealAttribute(){
    	switch ($this->job_level) {
    		case 1:
    			# code...
    			return 'Graduate trainee';
    			break;
    		case 2:
    			# code...
    			return 'Volunteer, internship';
    			break; 
   			case 3:
    			# code...
    			return 'Entry level';
    			break; 
   			case 4:
    			# code...
    			return 'Mid level';
    			break;
   			case 5:
    			# code...
    			return 'Senior level';
    			break;
   			case 6:
    			# code...
    			return 'Management level';
    			break;
   			case 7:
    			# code...
    			return 'Executive level';
    			break;
    		default:
    			# code...
    			break;
    	}
    }
}


