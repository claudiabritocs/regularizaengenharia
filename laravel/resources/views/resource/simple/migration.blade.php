use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class {{ $migrationClass }} extends Migration
{
    public function up()
    {
        Schema::create('{{ $gen->table }}', function (Blueprint $table) {
            $table->increments('id');
@foreach($gen->fields as $field)
            $table->{{ $field['type'] }}('{{ $field['name'] }}');
@endforeach
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('{{ $gen->table }}');
    }
}
