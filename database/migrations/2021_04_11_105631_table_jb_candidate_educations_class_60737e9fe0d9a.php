<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbCandidateEducationsClass60737e9fe0d9a extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_candidate_educations', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_candidate_id')->nullable();
                        $table->string('jb_education_id')->nullable();
                        $table->string('name')->nullable();
                        $table->string('qualifications')->nullable();
                        $table->string('date_from')->nullable();
                        $table->string('date_to')->nullable();
                        $table->string('user_id')->nullable();
            
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
        Schema::dropIfExists('jb_candidate_educations');
    }
}