<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable =[
        'nome','sobrenome','vagas','local',
        'email','telefone','celebracao_id'
    ];

    public function celebracao()
    {
        return $this->hasOne('App\Models\Celebracao');
    }
}
