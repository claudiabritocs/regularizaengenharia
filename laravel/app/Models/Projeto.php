<?php

namespace App\Models;

use App\Helpers\CropImage;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table = 'projetos';

    protected $guarded = ['id'];

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

    public function imagens()
    {
        return $this->hasMany('App\Models\ProjetoImagem', 'projeto_id')->ordenados();
    }

    public static function upload_capa()
    {
        return CropImage::make('capa', [
            'width'  => 425,
            'height' => 240,
            'path'   => 'assets/img/projetos/'
        ]);
    }
}
