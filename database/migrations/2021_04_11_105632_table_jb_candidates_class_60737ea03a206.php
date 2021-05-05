<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbCandidatesClass60737ea03a206 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_candidates', function (Blueprint $table) {
            $table->id();

                        $table->string('user_id')->nullable();
                        $table->string('name')->nullable();
                        $table->string('email')->nullable();
                        $table->string('phone_number')->nullable();
                        $table->string('address')->nullable();
                        $table->string('date_of_birth')->nullable();
                        $table->string('age')->nullable();
                        $table->string('gender')->nullable();
                        $table->string('marital_status')->nullable();
                        $table->string('cv_upload')->nullable();
                        $table->string('cover_letter')->nullable();
                        $table->string('cv_string')->nullable();
                        $table->string('jb_discipline_id')->nullable();
                        $table->string('profile_photo')->nullable();
                        $table->string('profile_video')->nullable();
            
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
        Schema::dropIfExists('jb_candidates');
    }
}