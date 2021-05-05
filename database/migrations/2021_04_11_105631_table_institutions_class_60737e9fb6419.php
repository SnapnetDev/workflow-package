<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableInstitutionsClass60737e9fb6419 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();

                        $table->string('user_id')->nullable();
                        $table->string('name')->nullable();
                        $table->string('course')->nullable();
                        $table->string('degree')->nullable();
                        $table->string('degree_class')->nullable();
                        $table->string('start_year')->nullable();
                        $table->string('end_year')->nullable();
                        $table->string('country_id')->nullable();
                        $table->string('description')->nullable();
            
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
        Schema::dropIfExists('institutions');
    }
}