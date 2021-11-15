namespace App\Http\Controllers\{{ $gen->namespace }};

use Illuminate\Http\Request;

use App\Http\Requests\{{ $requestName }};
use App\Http\Controllers\Controller;

use App\Models\{{ $gen->model }}Categoria;

class {{ $controllerName }} extends Controller
{
    public function index()
    {
        $categorias = {{ $gen->model }}Categoria::ordenados()->get();

        return view('{{ $namespace }}.{{ $route }}.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('{{ $namespace }}.{{ $route }}.categorias.create');
    }

    public function store({{ $requestName }} $request)
    {
        try {

            $input = $request->all();

            {{ $gen->model }}Categoria::create($input);
            return redirect()->route('{{ $namespace }}.{{ $route }}.categorias.index')->with('success', 'Categoria adicionada com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar categoria: '.$e->getMessage()]);

        }
    }

    public function edit({{ $gen->model }}Categoria $categoria)
    {
        return view('{{ $namespace }}.{{ $route }}.categorias.edit', compact('categoria'));
    }

    public function update({{ $requestName }} $request, {{ $gen->model }}Categoria $categoria)
    {
        try {

            $input = $request->all();

            $categoria->update($input);
            return redirect()->route('{{ $namespace }}.{{ $route }}.categorias.index')->with('success', 'Categoria alterada com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar categoria: '.$e->getMessage()]);

        }
    }

    public function destroy({{ $gen->model }}Categoria $categoria)
    {
        try {

            $categoria->delete();
            return redirect()->route('{{ $namespace }}.{{ $route }}.categorias.index')->with('success', 'Categoria excluída com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir categoria: '.$e->getMessage()]);

        }
    }
}
