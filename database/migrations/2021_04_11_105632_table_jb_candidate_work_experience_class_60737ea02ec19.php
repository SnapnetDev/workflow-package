<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbCandidateWorkExperienceClass60737ea02ec19 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_candidate_work_experience', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_candidate_id')->nullable();
                        $table->string('company_name')->nullable();
                        $table->string('company_role')->nullable();
                        $table->string('role_description')->nullable();
                        $table->string('work_from')->nullable();
                        $table->string('work_to')->nullable();
            
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
        Schema::dropIfExists('jb_candidate_work_experience');
    }
}