namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\CropImage;

class {{ $gen->model }}Imagem extends Model
{
    protected $table = '{{ $gen->table }}_imagens';

    protected $guarded = ['id'];

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

    public function scope{{ $gen->model }}($query, $id)
    {
        return $query->where('{{ strtolower($gen->model) }}_id', $id);
    }

    public static function uploadImagem()
    {
        return CropImage::make('imagem', [
            [
                'width'   => 180,
                'height'  => 180,
                'path'    => 'assets/img/{{ $gen->table }}/imagens/thumbs/'
            ],
            [
                'width'   => null,
                'height'  => null,
                'path'    => 'assets/img/{{ $gen->table }}/imagens/'
            ]
        ]);
    }
}
