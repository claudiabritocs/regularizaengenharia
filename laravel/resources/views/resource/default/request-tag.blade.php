namespace App\Http\Requests;

use App\Http\Requests\Request;

class {{ $request }} extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required'
        ];
    }
}
