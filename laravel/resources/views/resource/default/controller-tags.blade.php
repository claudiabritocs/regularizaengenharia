namespace App\Http\Controllers\{{ $gen->namespace }};

use Illuminate\Http\Request;

use App\Http\Requests\{{ $requestName }};
use App\Http\Controllers\Controller;

use App\Models\{{ $gen->model }}Tag;

class {{ $controllerName }} extends Controller
{
    public function index()
    {
        $tags = {{ $gen->model }}Tag::ordenados()->get();

        return view('{{ $namespace }}.{{ $route }}.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('{{ $namespace }}.{{ $route }}.tags.create');
    }

    public function store({{ $requestName }} $request)
    {
        try {

            $input = $request->all();

            {{ $gen->model }}Tag::create($input);
            return redirect()->route('{{ $namespace }}.{{ $route }}.tags.index')->with('success', 'Tag adicionada com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar tag: '.$e->getMessage()]);

        }
    }

    public function edit({{ $gen->model }}Tag $tag)
    {
        return view('{{ $namespace }}.{{ $route }}.tags.edit', compact('tag'));
    }

    public function update({{ $requestName }} $request, {{ $gen->model }}Tag $tag)
    {
        try {

            $input = $request->all();

            $tag->update($input);
            return redirect()->route('{{ $namespace }}.{{ $route }}.tags.index')->with('success', 'Tag alterada com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar tag: '.$e->getMessage()]);

        }
    }

    public function destroy({{ $gen->model }}Tag $tag)
    {
        try {

            $tag->delete();
            return redirect()->route('{{ $namespace }}.{{ $route }}.tags.index')->with('success', 'Tag excluída com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir tag: '.$e->getMessage()]);

        }
    }
}
