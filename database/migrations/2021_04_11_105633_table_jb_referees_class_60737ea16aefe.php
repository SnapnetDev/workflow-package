<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbRefereesClass60737ea16aefe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_referees', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_candidate_id')->nullable();
                        $table->string('name')->nullable();
                        $table->string('phone')->nullable();
                        $table->string('address')->nullable();
            
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
        Schema::dropIfExists('jb_referees');
    }
}