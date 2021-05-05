<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableJbRolePermissionsClass60737ea185b23 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('jb_role_permissions', function (Blueprint $table) {
            $table->id();

                        $table->string('jb_role_id')->nullable();
                        $table->string('jb_permission_id')->nullable();
            
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
        Schema::dropIfExists('jb_role_permissions');
    }
}