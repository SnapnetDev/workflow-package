<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbCandidateJobsClass60737ea00d262 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_candidate_jobs', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_job_id')->nullable();
                        $table->string('jb_candidate_id')->nullable();
                        $table->string('approved')->nullable();
                        $table->string('status')->nullable();
            
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
        Schema::dropIfExists('jb_candidate_jobs');
    }
}