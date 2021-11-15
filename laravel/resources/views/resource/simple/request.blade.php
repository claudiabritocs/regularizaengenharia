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
@foreach($gen->fields as $field)
            '{{ $field['name'] }}' => '{{ $field['validation'] }}',
@endforeach
        ];
    }
}
