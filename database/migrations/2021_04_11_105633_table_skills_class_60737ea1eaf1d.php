<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSkillsClass60737ea1eaf1d extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();

                        $table->string('user_id')->nullable();
                        $table->string('skill_id')->nullable();
                        $table->string('proficiency_id')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}