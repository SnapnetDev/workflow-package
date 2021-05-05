<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbCandidateCompetenciesClass60737e9fcd21a extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_candidate_competencies', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_candidate_id')->nullable();
                        $table->string('jb_competency_id')->nullable();
            
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
        Schema::dropIfExists('jb_candidate_competencies');
    }
}