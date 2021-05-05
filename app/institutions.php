<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institutions extends Model
{
	protected $table='institutions';
    //
	protected $fillable=['user_id', 'name', 'course', 'degree', 'degree_class', 'start_year', 'end_year', 'country_id','description'];



	public function user(){
		return $this->belongsTo('App\User','user_id')->withDefault();
	}

	public function getDegreeResolveAttribute(){
		switch ($this->degree) {
			case 1:
			return 'Degree';
        			# code...
			case 2:
			return 'Diploma';
        			# code...
			break;
			case 3:
			return 'High School(S.S.C.E)';
        			# code...
			case 4:
        			# code...
			return 'HND';
			break;
			case 5:
        			# code...
			return 'MBA/MSc';
			break;
			case 6:
			return 'MBBS';
        			# code...
			break;
			case 7:
			return 'MPhil/PhD';
			break;
			case 8:
        			# code...
			return 'N.C.E';
			break;
			case 9:
        			# code...
			return 'OND';
			break;
			case 10:
        			# code...
			return 'Others';
			break;
			case 11:
        			# code...
			return 'Vocational';
			break;

			default:
        			# code...
			break;
		}
	}
	public function getGradeResolveAttribute(){
		switch ($this->degree_class) {
			case 1:
			return 'First Class';
        			# code...
			case 2:
			return 'Second Class Upper';
        			# code...
			break;
			case 3:
			return 'Second Class Lower';
        			# code...
			case 4:
        			# code...
			return 'Upper Credit';
			break;
			case 5:
        			# code...
			return 'Distinction';
			break;
			case 6:
			return 'Lower Credit';
        			# code...
			break;
			case 7:
			return 'Pass';
			break;
			case 8:
        			# code...
			return 'Third Class';
			break;
			default:
        			# code...
			break;
		}
	}

}





