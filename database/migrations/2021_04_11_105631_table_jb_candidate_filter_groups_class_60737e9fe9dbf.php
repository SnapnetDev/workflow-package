<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbCandidateFilterGroupsClass60737e9fe9dbf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_candidate_filter_groups', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_filter_group_id')->nullable();
                        $table->string('jb_candidate_id')->nullable();
                        $table->string('comments')->nullable();
            
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
        Schema::dropIfExists('jb_candidate_filter_groups');
    }
}