use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class {{ $migrationClass }} extends Migration
{
    public function up()
    {
@if($gen->categories)
        Schema::create('{{ $gen->table }}_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordem')->default(0);
            $table->string('titulo');
            $table->string('slug');
            $table->timestamps();
        });

@endif
        Schema::create('{{ $gen->table }}', function (Blueprint $table) {
            $table->increments('id');
@if($gen->categories)
            $table->integer('{{ $gen->table }}_categoria_id')->unsigned()->nullable();
@endif
@if($gen->sortable)
            $table->integer('ordem')->default(0);
@endif
@if($gen->slug)
            $table->string('slug');
@endif
@foreach($gen->fields as $field)
            $table->{{ $field['type'] }}('{{ $field['name'] }}');
@endforeach
@if($gen->categories)
            $table->foreign('{{ $gen->table }}_categoria_id')->references('id')->on('{{ $gen->table }}_categorias')->onDelete('set null');
@endif
            $table->timestamps();
        });
@if($gen->tags)

        Schema::create('{{ $gen->table }}_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordem')->default(0);
            $table->string('titulo');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('{{ strtolower($gen->model) }}_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('{{ strtolower($gen->model) }}_id')->unsigned();
            $table->integer('{{ strtolower($gen->model) }}_tag_id')->unsigned();
            $table->timestamps();
            $table->foreign('{{ strtolower($gen->model) }}_id')->references('id')->on('{{ $gen->table }}');
            $table->foreign('{{ strtolower($gen->model) }}_tag_id')->references('id')->on('{{ $gen->table }}_tags');
        });
@endif
@if($gen->gallery)

        Schema::create('{{ $gen->table }}_imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('{{ strtolower($gen->model) }}_id')->unsigned();
            $table->integer('ordem')->default(0);
            $table->string('imagem');
            $table->timestamps();
            $table->foreign('{{ strtolower($gen->model) }}_id')->references('id')->on('{{ $gen->table }}')->onDelete('cascade');
        });
@endif
    }

    public function down()
    {
@if($gen->gallery)
        Schema::drop('{{ $gen->table }}_imagens');
@endif
@if($gen->tags)
        Schema::drop('{{ strtolower($gen->model) }}_tag');
        Schema::drop('{{ $gen->table }}_tags');
@endif
        Schema::drop('{{ $gen->table }}');
@if($gen->categories)
        Schema::drop('{{ $gen->table }}_categorias');
@endif
    }
}
