<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbCandidateDocumentsClass60737e9fd7e1d extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_candidate_documents', function (Blueprint $table) {
            $table->id();

                        $table->string('user_id')->nullable();
                        $table->string('name')->nullable();
                        $table->string('file')->nullable();
            
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
        Schema::dropIfExists('jb_candidate_documents');
    }
}