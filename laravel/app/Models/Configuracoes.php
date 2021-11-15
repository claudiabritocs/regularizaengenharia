<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\CropImage;

class Configuracoes extends Model
{
    protected $table = 'configuracoes';

    protected $guarded = ['id'];

    public static function upload_imagem_de_compartilhamento()
    {
        return CropImage::make('imagem_de_compartilhamento', [
            'width'  => null,
            'height' => null,
            'path'   => 'assets/img/'
        ]);
    }

}
