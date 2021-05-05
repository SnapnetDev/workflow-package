<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbPermissionsClass60737ea156a30 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_permissions', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_role_id')->nullable();
                        $table->string('name')->nullable();
                        $table->string('constant')->nullable();
                        $table->string('sort_index')->nullable();
            
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
        Schema::dropIfExists('jb_permissions');
    }
}