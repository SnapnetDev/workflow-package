use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class {{ implode('',array_map('ucfirst', explode('_',$className) )) }} extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{{ $tableName }}', function (Blueprint $table) {
            $table->id();

            @foreach ($fields as $field)
            $table->string('{{ $field }}')->nullable();
            @endforeach

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('{{ $tableName }}');
    }
}