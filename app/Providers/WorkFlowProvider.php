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
           __DIR__  . '/../../resources/views/workflow_user_groups'=>resource_path('views/workflow_user_groups'),

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

           __DIR__  . '/../../routes'=>base_path('routes/workflow-routes'),


           /////Migrations/////

           __DIR__ . '/../../database/migrations/2021_04_13_102923_create_work_flows_table.php'=>base_path('database/migrations/2021_04_13_102923_create_work_flows_table.php'),
           __DIR__ . '/../../database/migrations/2021_04_13_103917_create_work_flow_stages_table.php'=>base_path('database/migrations/2021_04_13_103917_create_work_flow_stages_table.php'),
           __DIR__ . '/../../database/migrations/2021_04_13_104015_create_work_flow_groups_table.php'=>base_path('database/migrations/2021_04_13_104015_create_work_flow_groups_table.php'),
           __DIR__ . '/../../database/migrations/2021_04_13_104056_create_work_flow_user_groups_table.php'=>base_path('database/migrations/2021_04_13_104056_create_work_flow_user_groups_table.php'),
           __DIR__ . '/../../database/migrations/2021_04_13_104214_create_work_flow_instances_table.php'=>base_path('database/migrations/2021_04_13_104214_create_work_flow_instances_table.php'),
           __DIR__ . '/../../database/migrations/2021_04_13_104338_create_work_flow_instance_stages_table.php'=>base_path('database/migrations/2021_04_13_104338_create_work_flow_instance_stages_table.php'),
           __DIR__ . '/../../database/migrations/2021_04_14_090614_add_module_to_work_flow_instances.php'=>base_path('database/migrations/2021_04_14_090614_add_module_to_work_flow_instances.php'),


       ]);

    }


}
