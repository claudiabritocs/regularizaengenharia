<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContatoRecebido extends Model
{
    protected $table = 'contatos_recebidos';

    protected $guarded = ['id'];

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
    }

    public function getCreatedAtOrderAttribute()
    {
        return \Carbon\Carbon::createFromFormat('d/m/Y', $this->created_at)->format('Y-m-d');
    }

    public function scopeNaoLidos($query)
    {
        return $query->where('lido', '!=', 1);
    }

    public function countNaoLidos()
    {
        return $this->naoLidos()->count();
    }
}
