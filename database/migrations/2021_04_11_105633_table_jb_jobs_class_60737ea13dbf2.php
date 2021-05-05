<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbJobsClass60737ea13dbf2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_jobs', function (Blueprint $table) {
            $table->id();

                        $table->string('code')->nullable();
                        $table->string('role')->nullable();
                        $table->string('description')->nullable();
                        $table->string('jb_recruitment_type_id')->nullable();
                        $table->string('salary_start')->nullable();
                        $table->string('salary_stop')->nullable();
                        $table->string('address')->nullable();
                        $table->string('created_by')->nullable();
                        $table->string('expiry_date')->nullable();
                        $table->string('years_of_experience')->nullable();
                        $table->string('visible')->nullable();
                        $table->string('discipline_id')->nullable();
                        $table->string('region_id')->nullable();
                        $table->string('use_profile_video')->nullable();
            
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
        Schema::dropIfExists('jb_jobs');
    }
}