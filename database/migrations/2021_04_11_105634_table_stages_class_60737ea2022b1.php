<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableStagesClass60737ea2022b1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();

                        $table->string('stage_name')->nullable();
                        $table->string('position')->nullable();
                        $table->string('percentage')->nullable();
            
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
        Schema::dropIfExists('stages');
    }
}