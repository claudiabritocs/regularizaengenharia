<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\CropImage;

class Imagem extends Model
{
    protected $table = 'imagens';

    protected $guarded = ['id'];

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

    public static function upload_imagem()
    {
        return CropImage::make('imagem', [
            'width'  => 440,
            'height' => 245,
            'path'   => 'assets/img/imagens/'
        ]);
    }
}
