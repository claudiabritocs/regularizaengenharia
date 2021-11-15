namespace App\Http\Controllers\{{ $gen->namespace }};

use Illuminate\Http\Request;

use App\Http\Requests\{{ $requestName }};
use App\Http\Controllers\Controller;

use App\Models\{{ $gen->model }};
use App\Models\{{ $gen->model }}Imagem;

use App\Helpers\CropImage;

class {{ $controllerName }} extends Controller
{
    public function index({{ $gen->model }} $registro)
    {
        $imagens = {{ $gen->model }}Imagem::{{ strtolower($gen->model) }}($registro->id)->ordenados()->get();

        return view('{{ $namespace }}.{{ $route }}.imagens.index', compact('imagens', 'registro'));
    }

    public function show({{ $gen->model }} $registro, {{ $gen->model }}Imagem $imagem)
    {
        return $imagem;
    }

    public function store({{ $gen->model }} $registro, {{ $requestName }} $request)
    {
        try {

            $input = $request->all();
            $input['imagem'] = {{ $gen->model}}Imagem::uploadImagem();
            $input['{{ strtolower($gen->model) }}_id'] = $registro->id;

            $imagem = {{ $gen->model }}Imagem::create($input);

            $view = view('{{ $namespace }}.{{ $route }}.imagens.imagem', compact('registro', 'imagem'))->render();

            return response()->json(['body' => $view]);

        } catch (\Exception $e) {

            return 'Erro ao adicionar imagem: '.$e->getMessage();

        }
    }

    public function destroy({{ $gen->model }} $registro, {{ $gen->model }}Imagem $imagem)
    {
        try {

            $imagem->delete();
            return redirect()->route('{{ $namespace }}.{{ $route }}.imagens.index', $registro)
                             ->with('success', 'Imagem excluída com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir imagem: '.$e->getMessage()]);

        }
    }

    public function clear({{ $gen->model }} $registro)
    {
        try {

            $registro->imagens()->delete();
            return redirect()->route('{{ $namespace }}.{{ $route }}.imagens.index', $registro)
                             ->with('success', 'Imagens excluídas com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir imagens: '.$e->getMessage()]);

        }
    }
}
