<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\CropImage;

class Contato extends Model
{
    protected $table = 'contato';

    protected $guarded = ['id'];

}
