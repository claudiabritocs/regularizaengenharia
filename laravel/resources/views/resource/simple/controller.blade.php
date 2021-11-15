namespace App\Http\Controllers\{{ $gen->namespace }};

use Illuminate\Http\Request;

use App\Http\Requests\{{ $requestName }};
use App\Http\Controllers\Controller;

use App\Models\{{ $gen->model }};

class {{ $controllerName }} extends Controller
{
    public function index()
    {
        $registro = {{ $gen->model }}::first();

        return view('{{ $namespace }}.{{ $route }}.edit', compact('registro'));
    }

    public function update({{ $requestName }} $request, {{ $gen->model }} $registro)
    {
        try {
            $input = $request->all();

@foreach($gen->fields as $field)
@if(strpos($field['validation'], 'image') !== false)
            if (isset($input['{{ $field['name'] }}'])) $input['{{ $field['name'] }}'] = {{ $gen->model }}::upload_{{ $field['name'] }}();
@endif
@endforeach

            $registro->update($input);

            return redirect()->route('{{ $namespace }}.{{ $route }}.index')->with('success', 'Registro alterado com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['Erro ao alterar registro: '.$e->getMessage()]);
        }
    }
}
