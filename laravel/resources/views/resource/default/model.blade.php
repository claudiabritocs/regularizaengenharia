namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\CropImage;

@if($gen->slug)
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class {{ $gen->model }} extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => '{{ $gen->slug }}',
        'save_to'    => 'slug',
        'on_update'  => true
    ];

@else
class {{ $gen->model }} extends Model
{
@endif
    protected $table = '{{ $gen->table }}';

    protected $guarded = ['id'];
@if($gen->sortable)

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }
@endif
@if($gen->categories)

    public function scopeCategoria($query, $categoria_id)
    {
        return $query->where('{{ $gen->table }}_categoria_id', $categoria_id);
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\{{ $gen->model }}Categoria', '{{ $gen->table }}_categoria_id');
    }
@endif
@if($gen->tags)

    public function tags()
    {
        return $this->belongsToMany('App\Models\{{ $gen->model}}Tag', '{{ strtolower($gen->model) }}_tag', '{{ strtolower($gen->model) }}_id', '{{ strtolower($gen->model) }}_tag_id')->ordenados();
    }
@endif
@if($gen->gallery)

    public function imagens()
    {
        return $this->hasMany('App\Models\{{ $gen->model }}Imagem', '{{ strtolower($gen->model) }}_id')->ordenados();
    }
@endif
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
