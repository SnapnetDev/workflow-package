<?php

namespace App;

use App\Models\JbCandidate;
use App\Models\WorkFlowGroup;
use App\Models\WorkFlowUserGroup;
use App\Traits\RequestFilterTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use RequestFilterTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dob','sex','phone_num','marital_status','address','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function candidate(){
        // return $this->candidates->first();
        return $this->hasOne(JbCandidate::class,'user_id');
    }

    function hasVideoCv(){
    	$query = (new User)->newQuery();
    	$id = $this->id;
    	$query = $query->where('id',$id)->whereHas('candidate',function(Builder $builder){
    		return $builder->whereNotNull('profile_video')->where('profile_video','<>',''); //where('profile_video',1);
	    });
    	return $query->exists();
    }

    function hasUploadedCv(){
        // dd($this->candidate);
       return $this->candidates()->exists();
    }

    function candidates(){
        return $this->hasMany(JbCandidate::class,'user_id');
    }

    function documents(){
        return $this->hasMany(JbCandidateDocument::class,'user_id');
    }

    function fetch($filters=[]):Builder{
    	$filters = $this->getResolvedFilter($filters);
    	$query = (new User)->newQuery();

    	if (isset($filters['email'])){
    		$query = $query->where('email',$filters['email']);
	    }


    	return $query;
    }

    static function getFactory(){
        return new self;
    }

    static function fetchV2(){
        return self::getFactory()->newQuery();
    }


    function groups(){
        return $this->hasMany(WorkFlowUserGroup::class,'user_id');
    }






}
