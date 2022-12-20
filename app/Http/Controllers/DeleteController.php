<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Admin;
use App\Models\User;
use App\Models\Professore;
use App\Models\Orientadore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class DeleteController extends Controller
{
    public function destroy_admin($id){
        Admin::where('user_id', $id)->delete();
        User::where('id', $id)->delete();

        return back()->with('msg', 'Usuário Eliminado com sucesso!');

    }
    public function destroy_aluno($id){
        Aluno::where('user_id', $id)->delete();
        Orientadore::join('alunos', 'orientadores.id', 'alunos.orientadore_id')->where('alunos.user_id', $id)->delete();
        User::where('id', $id)->delete();

        return back()->with('msg', 'Usuário Eliminado com sucesso!');

    }
    public function destroy_professor($id){
        Sala::join('professores', 'professores.id', 'salas.professore_id')->where('professores.user_id', $id)->delete();
        Professore::where('user_id', $id)->delete();
        User::where('id', $id)->delete();

        return back()->with('msg', 'Usuário Eliminado com sucesso!');

    }
    public function destroy_orientador($id){
    $aluno =  Aluno::join('orientadores', 'orientadores.id', 'alunos.orientadore_id')->where('orientadores.user_id', $id)->first();
    $aluno->update(['orientadore_id' => NULL]);

        Orientadore::where('user_id', $id)->delete();
        User::where('id', $id)->delete();

        return back()->with('msg', 'Usuário Eliminado com sucesso!');

    }
}
