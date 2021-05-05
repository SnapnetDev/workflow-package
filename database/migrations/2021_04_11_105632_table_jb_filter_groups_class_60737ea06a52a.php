<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbFilterGroupsClass60737ea06a52a extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_filter_groups', function (Blueprint $table) {
            $table->id();

                        $table->string('user_id')->nullable();
                        $table->string('name')->nullable();
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
        Schema::dropIfExists('jb_filter_groups');
    }
}