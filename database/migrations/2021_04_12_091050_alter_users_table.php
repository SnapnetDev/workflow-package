<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function(Blueprint $table){

//            $table->string('emp_num')->nullable();
//            $table->string('sex')->nullable();
//            $table->string('dob')->nullable();
//            $table->string('age')->nullable();
//            $table->string('phone_num')->nullable();
//            $table->string('marital_status')->nullable();
//            $table->string('workdept_id')->nullable();
//            $table->string('job_id')->nullable();
//            $table->string('hiredate')->nullable();
//            $table->string('role')->nullable();
//            $table->string('EDLEVEL')->nullable();
//            $table->string('image')->nullable();
////            $table->string('remember_token')->nullable();
//            $table->string('last_promoted')->nullable();
//            $table->string('address')->nullable();
//            $table->string('next_of_kin')->nullable();
//            $table->string('kin_address')->nullable();
//            $table->string('kin_phonenum')->nullable();
//            $table->string('kin_relationship')->nullable();
//            $table->string('twitter')->nullable();
//            $table->string('facebook')->nullable();
//            $table->string('dribble')->nullable();
//            $table->string('instagram')->nullable();
//            $table->string('linemanager_id')->nullable();
//            $table->string('job_app_id')->nullable();
//            $table->string('state_origin_id')->nullable();
//            $table->string('lga')->nullable();
////            $table->string('status')->nullable();
//            $table->string('locked')->nullable();
//            $table->string('job_reg_status')->nullable();
//            $table->string('superadmin')->nullable();
//            $table->string('bank_name')->nullable();
//            $table->string('bank_id')->nullable();
//            $table->string('account_num')->nullable();
//            $table->string('grade')->nullable();
//            $table->string('locale')->nullable();
//            $table->string('bank_code')->nullable();
//            $table->string('prev_grade')->nullable();
//            $table->string('last_grade_change_date')->nullable();
//            $table->string('confirmed')->nullable();
//            $table->string('seperation_date')->nullable();
//            $table->string('about_me')->nullable();
//            $table->string('jb_role_id')->nullable();

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
