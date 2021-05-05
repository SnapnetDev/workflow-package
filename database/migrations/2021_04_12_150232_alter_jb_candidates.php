<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJbCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('jb_candidates',function(Blueprint $blueprint){
            //cv_string
            $blueprint->dropColumn('cv_string');
        });

        Schema::table('jb_candidates',function(Blueprint $blueprint){
            //cv_string
            $blueprint->longText('cv_string')->nullable();
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
    }
}
