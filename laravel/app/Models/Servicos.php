<?php

namespace App\Models;

use App\Helpers\CropImage;
use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    protected $table = 'servicos';

    protected $guarded = ['id'];

    public static function upload_imagem()
    {
        return CropImage::make('imagem', [
            'width'  => 400,
            'height' => 250,
            'path'   => 'assets/img/servicos/'
        ]);
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

}
