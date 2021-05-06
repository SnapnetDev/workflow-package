<?php

namespace App\Providers;

use App\Models\WorkFlow;
use App\Models\WorkFlowGroup;
use App\Models\WorkFlowUserGroup;
use Illuminate\Database\Eloquent\Builder;
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

        view()->share('getUserGroups',function($user){

            $query = WorkFlowGroup::query()->whereHas('user_groups',function(Builder $builder) use ($user){

                return $builder->where('user_id',$user->id);

            });

            return $query->get();

        });

        view()->share('confirm',function($text='Do You confirm this action'){
            return "onsubmit=\"return confirm('$text')\"";
        });


        view()->share('selected',function($value){
            if ($value){
                return ' selected=selected ';
            }
            return '';
        });


    }
}
