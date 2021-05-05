<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJbJobsDescription2 extends Migration
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

            $blueprint->longText("description")->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('jb_jobs',function(Blueprint $blueprint){

            $blueprint->dropColumn("description");

        });

    }

}
