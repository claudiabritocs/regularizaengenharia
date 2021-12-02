<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $guarded = ['id'];

    public function scopeOrdenados($query)
    {
        return $query->orderBy('ordem', 'ASC')->orderBy('id', 'DESC');
    }

}
