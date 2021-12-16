<?php

namespace App\Models;

use App\Helpers\CropImage;
use App\Helpers\CropImageTinify;
use Illuminate\Database\Eloquent\Model;

class ProjetoImagem extends Model
{
    protected $table = 'projetos_imagens';

    protected $guarded = ['id'];

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

    public function scopeProjeto($query, $id)
    {
        return $query->where('projeto_id', $id);
    }

    public static function upload_imagem()
    {
        return CropImage::make('imagem', [
            [
                'width'   => 180,
                'height'  => 180,
                'path'    => 'assets/img/projetos/imagens/thumbs/'
            ],
            [
                'width'   => null,
                'height'  => 620,
                'path'    => 'assets/img/projetos/imagens/'
            ]
        ]);
    }
}
