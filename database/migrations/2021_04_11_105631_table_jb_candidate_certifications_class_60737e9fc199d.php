<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbCandidateCertificationsClass60737e9fc199d extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_candidate_certifications', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_candidate_id')->nullable();
                        $table->string('jb_certification_id')->nullable();
                        $table->string('date_certified')->nullable();
            
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
        Schema::dropIfExists('jb_candidate_certifications');
    }
}