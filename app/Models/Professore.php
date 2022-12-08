<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professore extends Model
{
    use HasFactory;

    protected $fillable = [
        'primeiro_nome',
        'ultimo_nome',
        'nome_completo',
        'email',
        'telefone',
        'imagem_orientador',
        'curso',
        'palavra-passe',
        'user_id',
        'cadeira',

    ];
    protected $hiden = ['palavra-passe'];
    protected $dates = ['data_nasc'];
    protected $guarded = [];

    public function salas(){
        return $this->hasMany('App\Models\Sala');
    }
}
