namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class {{ $gen->model }}Categoria extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'titulo',
        'save_to'    => 'slug',
        'on_update'  => true
    ];

    protected $table = '{{ $gen->table }}_categorias';

    protected $guarded = ['id'];

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->whereSlug($slug);
    }

    public function {{ $gen->table }}()
    {
        return $this->hasMany('App\Models\{{ $gen->model }}', '{{ $gen->table }}_categoria_id')->ordenados();
    }
}
