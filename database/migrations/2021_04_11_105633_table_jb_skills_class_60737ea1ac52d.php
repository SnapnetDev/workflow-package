<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbSkillsClass60737ea1ac52d extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_skills', function (Blueprint $table) {
            $table->id();

                        $table->string('name')->nullable();
                        $table->string('created_by')->nullable();
                        $table->string('jb_discipline_id')->nullable();
            
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
        Schema::dropIfExists('jb_skills');
    }
}