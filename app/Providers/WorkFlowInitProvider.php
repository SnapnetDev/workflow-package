<?php

namespace App\Providers;

use App\Models\WorkFlowUserGroup;
use Illuminate\Support\ServiceProvider;

class WorkFlowInitProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        //

        view()->share('userHasGroup',function($user,$group){

            $userGroup = WorkFlowUserGroup::query()->where('user_id',$user->id)
                ->where('workflow_group_id',$group->id);

            return $userGroup->exists();

        });

        view()->share('userAnyHasGroup',function($user){

            $userGroup = WorkFlowUserGroup::query()->where('user_id',$user->id);

            return $userGroup->exists();

        });


        view()->share('selected',function($value){
            if ($value){
                return ' selected=selected ';
            }
            return '';
        });


    }
}
