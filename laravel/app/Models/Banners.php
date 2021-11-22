<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\CropImage;

class Banners extends Model
{
    protected $table = 'banners';

    protected $guarded = ['id'];

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

    public static function upload_imagem()
    {
        return CropImage::make('imagem', [
            'width'  => 1980,
            'height' => null,
            'path'   => 'assets/img/banners/'
        ]);
    }

}
