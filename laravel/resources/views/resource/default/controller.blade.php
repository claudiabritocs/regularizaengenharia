namespace App\Http\Controllers\{{ $gen->namespace }};

use Illuminate\Http\Request;

use App\Http\Requests\{{ $requestName }};
use App\Http\Controllers\Controller;

use App\Models\{{ $gen->model }};
@if($gen->categories)
use App\Models\{{ $gen->model}}Categoria;
@endif
@if($gen->tags)
use App\Models\{{ $gen->model}}Tag;
@endif

class {{ $controllerName }} extends Controller
{
@if($gen->categories)
    private $categorias;

@endif
@if($gen->tags)
    private $tags;

@endif
@if($gen->categories || $gen->tags)
    public function __construct()
    {
@if($gen->categories)
        $this->categorias = {{ $gen->model }}Categoria::ordenados()->lists('titulo', 'id');
@endif
@if($gen->tags)
        $this->tags = {{ $gen->model }}Tag::ordenados()->lists('titulo', 'id');
@endif
    }

@endif
@if($gen->categories)
    public function index(Request $request)
    {
        $categorias = $this->categorias;
        $filtro     = $request->query('filtro');

        if ({{ $gen->model }}Categoria::find($filtro)) {
            $registros = {{ $gen->model }}::where('{{ $gen->table }}_categoria_id', $filtro)->{!! $indexMethod !!};
        } else {
            $registros = {{ $gen->model }}::leftJoin('{{ $route }}_categorias as cat', 'cat.id', '=', '{{ $route }}_categoria_id')
                ->orderBy('cat.ordem', 'ASC')
                ->orderBy('cat.id', 'DESC')
                ->select('{{ $route }}.*')
                ->{!! $indexMethod !!};
        }

        return view('{{ $namespace }}.{{ $route }}.index', compact('categorias', 'registros', 'filtro'));
@else
    public function index()
    {
        $registros = {{ $gen->model }}::{!! $indexMethod !!};

        return view('{{ $namespace }}.{{ $route }}.index', compact('registros'));
@endif
    }

    public function create()
    {
@if($gen->categories)
        $categorias = $this->categorias;

@endif
@if($gen->tags)
        $tags = $this->tags;

@endif
@if($gen->categories || $gen->tags)
<?php
    $compact = "";
    $compact .= $gen->categories ? "'categorias'" : "";
    $compact .= $gen->tags ? $gen->categories ? ", 'tags'" : "'tags'" : "";
?>
        return view('{{ $namespace }}.{{ $route }}.create', compact({!! $compact !!}));
@else
        return view('{{ $namespace }}.{{ $route }}.create');
@endif
    }

    public function store({{ $requestName }} $request)
    {
        try {

@if($gen->tags)
            $input = $request->except('tags');
            $tags  = ($request->get('tags') ?: []);
@else
            $input = $request->all();
@endif

@foreach($gen->fields as $field)
@if(strpos($field['validation'], 'image') !== false)
            if (isset($input['{{ $field['name'] }}'])) $input['{{ $field['name'] }}'] = {{ $gen->model }}::upload_{{ $field['name'] }}();

@endif
@endforeach
@if($gen->tags)
            $registro = {{ $gen->model }}::create($input);
            $registro->tags()->sync($tags);
@else
            {{ $gen->model }}::create($input);
@endif

            return redirect()->route('{{ $namespace }}.{{ $route }}.index')->with('success', 'Registro adicionado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar registro: '.$e->getMessage()]);

        }
    }

    public function edit({{ $gen->model }} $registro)
    {
@if($gen->categories)
        $categorias = $this->categorias;

@endif
@if($gen->tags)
        $tags = $this->tags;

@endif
@if($gen->categories || $gen->tags)
<?php
    $compact = "'registro'";
    $compact .= $gen->categories ? ", 'categorias'" : "";
    $compact .= $gen->tags ? ", 'tags'" : "";
?>
        return view('{{ $namespace }}.{{ $route }}.edit', compact({!! $compact !!}));
@else
        return view('{{ $namespace }}.{{ $route }}.edit', compact('registro'));
@endif
    }

    public function update({{ $requestName }} $request, {{ $gen->model }} $registro)
    {
        try {

@if($gen->tags)
            $input = $request->except('tags');
@else
            $input = $request->all();
@endif

@foreach($gen->fields as $field)
@if(strpos($field['validation'], 'image') !== false)
            if (isset($input['{{ $field['name'] }}'])) $input['{{ $field['name'] }}'] = {{ $gen->model }}::upload_{{ $field['name'] }}();

@endif
@endforeach
            $registro->update($input);
@if($gen->tags)

            $tags = ($request->get('tags') ?: []);
            $registro->tags()->sync($tags);
@endif

            return redirect()->route('{{ $namespace }}.{{ $route }}.index')->with('success', 'Registro alterado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar registro: '.$e->getMessage()]);

        }
    }

    public function destroy({{ $gen->model }} $registro)
    {
        try {

@if($gen->tags)
            $registro->tags()->detach();
@endif
            $registro->delete();

            return redirect()->route('{{ $namespace }}.{{ $route }}.index')->with('success', 'Registro excluído com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir registro: '.$e->getMessage()]);

        }
    }

}
