<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\CropImage;

class Certificados extends Model
{
    protected $table = 'certificados';

    protected $guarded = ['id'];

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

    public static function upload_imagem()
    {
        return CropImage::make('imagem', [
            'width'  => null,
            'height' => 200,
            'path'   => 'assets/img/certificados/'
        ]);
    }

}
