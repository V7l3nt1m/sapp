<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'n_processo',
        'primeiro_nome',
        'ultimo_nome',
        'nome_completo',
        'email',
        'data_nasc',
        'telefone',
        'imagem_aluno',
        'curso',
        'repetente',
        'palavra_passe',
        'user_id',
        'turma',
        'curso',
        'genero',

    ];
    protected $hiden = ['palavra_passe'];
    protected $dates = ['data_nasc'];
    protected $guarded = [];

    public function sala(){
        return $this->belongsTo('App\Models\Sala');
    }

    public function orientador(){
        return $this->belongsTo('App\Models\Orientador');
    }

}
