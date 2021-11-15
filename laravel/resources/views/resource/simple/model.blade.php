namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\CropImage;

class {{ $gen->model }} extends Model
{
    protected $table = '{{ $gen->table }}';

    protected $guarded = ['id'];

@foreach($gen->fields as $field)
@if(strpos($field['validation'], 'image') !== false)
    public static function upload_{{ $field['name'] }}()
    {
        return CropImage::make('{{ $field['name'] }}', [
            'width'  => null,
            'height' => null,
            'path'   => 'assets/img/{{ $route }}/'
        ]);
    }

@endif
@endforeach
}
