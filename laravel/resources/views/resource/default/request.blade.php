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
        $rules = [
@if($gen->categories)
            '{{ $gen->table }}_categoria_id' => 'required',
@endif
@foreach($gen->fields as $field)
            '{{ $field['name'] }}' => '{{ $field['validation'] }}',
@endforeach
        ];

        if ($this->method() != 'POST') {
@foreach($gen->fields as $field)
@if(strpos($field['validation'], 'image') !== false)
            $rules['{{ $field['name'] }}'] = 'image';
@endif
@endforeach
        }

        return $rules;
    }
}
