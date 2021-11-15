use Illuminate\Database\Seeder;

class {{ $gen->model }}Seeder extends Seeder
{
    public function run()
    {
        DB::table('{{ $gen->table }}')->insert([
@foreach($gen->fields as $field)
            '{{ $field['name'] }}' => '{{ '' }}',
@endforeach
        ]);
    }
}
