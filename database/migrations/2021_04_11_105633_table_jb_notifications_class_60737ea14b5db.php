<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbNotificationsClass60737ea14b5db extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_notifications', function (Blueprint $table) {
            $table->id();

                        $table->string('user_id')->nullable();
                        $table->string('status')->nullable();
                        $table->string('seen')->nullable();
            
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
        Schema::dropIfExists('jb_notifications');
    }
}