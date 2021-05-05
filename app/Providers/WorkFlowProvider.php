<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//App\Providers\WorkFlowProvider
class WorkFlowProvider extends ServiceProvider
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

        

       $this->publishes([

          __DIR__  . '/../../resources/views/workflow'=>resource_path('views/workflow'),
          __DIR__  . '/../../resources/views/workflow_stages'=>resource_path('views/workflow_stages'),
          __DIR__  . '/../../resources/views/workflow_groups'=>resource_path('views/workflow_groups'),


           __DIR__  . '/../../app/Http/Controllers/WorkFlowController.php'=>app_path('Http/Controllers/WorkFlowController.php'),
           __DIR__  . '/../../app/Http/Controllers/WorkFlowGroupController.php'=>app_path('Http/Controllers/WorkFlowGroupController.php'),
           __DIR__  . '/../../app/Http/Controllers/WorkFlowInstanceController.php'=>app_path('Http/Controllers/WorkFlowInstanceController.php'),
           __DIR__  . '/../../app/Http/Controllers/WorkFlowStageController.php'=>app_path('Http/Controllers/WorkFlowStageController.php'),
           __DIR__  . '/../../app/Http/Controllers/WorkFlowInstanceStageController.php'=>app_path('Http/Controllers/WorkFlowInstanceStageController.php'),


           __DIR__  . '/../../app/Models/WorkFlow.php'=>app_path('Models/WorkFlow.php'),
           __DIR__  . '/../../app/Models/WorkFlowGroup.php'=>app_path('Models/WorkFlowGroup.php'),
           __DIR__  . '/../../app/Models/WorkFlowInstance.php'=>app_path('Models/WorkFlowInstance.php'),
           __DIR__  . '/../../app/Models/WorkFlowInstanceStage.php'=>app_path('Models/WorkFlowInstanceStage.php'),
           __DIR__  . '/../../app/Models/WorkFlowUserGroup.php'=>app_path('Models/WorkFlowUserGroup.php'),
           __DIR__  . '/../../app/Models/WorkFlowStage.php'=>app_path('Models/WorkFlowStage.php'),

           __DIR__  . '/../../routes'=>base_path('routes/vendor-routes'),


       ]);

    }


}
