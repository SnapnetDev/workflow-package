<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCandidateStagesClass60737e9f9ab90 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('candidate_stages', function (Blueprint $table) {
            $table->id();

                        $table->string('candidate_job_id')->nullable();
                        $table->string('stage_id')->nullable();
                        $table->string('status')->nullable();
                        $table->string('comment')->nullable();
                        $table->string('approved_by')->nullable();
            
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
        Schema::dropIfExists('candidate_stages');
    }
}