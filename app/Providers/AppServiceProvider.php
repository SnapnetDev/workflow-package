<?php

namespace App\Providers;

use App\Models\JbJob;
use App\Models\Stage;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    view()->share('jobs',function(){
	        return JbJob::all();
        });
	    view()->share('stages',function(){
	        return Stage::all();
        });


	    view()->share('hasPermission',function($contant){
            $permissionPort = app()->make(\App\Packages\PermissionPort::class);
            return $permissionPort->hasPermission($contant);
        });

	    view()->share('selected',function($value){
	        if ($value){
	            return ' selected=selected ';
            }
	        return '';
        });

	    view()->share('hidden',function($name,$value){
	        return "<input type='hidden' name='$name' value='$value' />";
        });


	    view()->share('getUserGroup',function($userId){
	        $listQuery = User::fetchV2()->where('id',$userId);
	        if ($listQuery->exists()){
	            return $listQuery->first()->groups;
            }
	        return [];
        });



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
