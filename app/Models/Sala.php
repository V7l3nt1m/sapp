<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = [

       'curso',
       'turma',
       'professor_id'

    ];

    public function professor(){
        return $this->belongsTo('App\Models\Professore');
    }

    public function alunos(){
        return $this->hasMany('App\Models\Aluno');
    }
}
