<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJbJobsAddWorkflowInstanceId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('jb_jobs',function(Blueprint $blueprint){
            $blueprint->integer('workflow_instance_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('jb_jobs',function(Blueprint $blueprint){
            $blueprint->dropColumn('workflow_instance_id');
        });
    }

}
