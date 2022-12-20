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

class GetController extends Controller
{
    public function cadastro_aluno(){
        return view('cadastro.alunos');
    }
    public function cadastro_professor(){
        return view('cadastro.professor');
    }
    
    //admin gerenciar
    public function addadminoutro () {
        $user = Auth()->user();

        return view('admin.adicionar_adminoutro', ['user' => $user]);
    }
    public function gerenadmins(Request $request){
        $user = Auth()->user();
        $search = $request->search;

        if($search){
            $admins = Admin::join('users', 'admins.user_id', 'users.id')->select('users.id as userid', 'users.*', 'admins.*')
            ->where('admins.nome', 'like', '%'.$search.'%')
            ->get();
        }else{
            $admins = Admin::join('users', 'admins.user_id', 'users.id')->select('users.id as userid', 'users.*', 'admins.*')->get();
        }
        return view('admin.gerenadmins', ['user' => $user, 'admins' => $admins]);
    }

    public function gerenaluno(Request $request){
        $user = Auth()->user();
        $search = $request->search;

        if($search){
            $alunos = Aluno::join('users', 'alunos.user_id', 'users.id')->select('users.id as userid', 'users.*', 'alunos.*')
            ->where('alunos.nome_completo', 'like', '%'.$search.'%')
            ->get();
        }else{
            $alunos = Aluno::join('users', 'alunos.user_id', 'users.id')->select('users.id as userid', 'users.*', 'alunos.*')->get();
        }
        return view('admin.gerenalunos', ['user' => $user, 'alunos' => $alunos]);
    }

    public function gerenprofessor(Request $request){
        $user = Auth()->user();
        $search = $request->search;

        if($search){
            $professores = Professore::join('users', 'professores.user_id', 'users.id')->select('users.id as userid', 'users.*', 'professores.*')
            ->where('professores.nome_completo', 'like', '%'.$search.'%')
            ->orWhere('professores.curso', 'like', '%'.$search.'%')
            ->get();
        }else{
            $professores = Professore::join('users', 'professores.user_id', 'users.id')->select('users.id as userid', 'users.*', 'professores.*')->get();
        }
        return view('admin.gerenprofessores', ['user' => $user, 'professores' => $professores]);
    }

    public function gerenorientador(Request $request){
        $user = Auth()->user();
        $search = $request->search;

        if($search){
            $orientadores = Orientadore::join('users', 'orientadores.user_id', 'users.id')->select('users.id as userid', 'users.*', 'orientadores.*')
            ->where('orientadores.nome_completo', 'like', '%'.$search.'%')
            ->orWhere('orientadores.cadeira', 'like', '%'.$search.'%')
            ->get();
        }else{
            $orientadores = Orientadore::join('users', 'orientadores.user_id', 'users.id')->select('users.id as userid', 'users.*', 'orientadores.*')->get();
        }
        return view('admin.gerenorientadores', ['user' => $user, 'orientadores' => $orientadores]);
    }

    public function dados_orientador(Request $request){
        $user = Auth()->user();
        $search = $request->search;

        if($search){
            $orientadores = Orientadore::join('users', 'orientadores.user_id', 'users.id')->select('users.id as userid', 'users.*', 'orientadores.*')
            ->where('orientadores.nome_completo', 'like', '%'.$search.'%')
            ->orWhere('orientadores.cadeira', 'like', '%'.$search.'%')
            ->get();
        }else{
            $orientadores = Orientadore::join('users', 'orientadores.user_id', 'users.id')->select('users.id as userid', 'users.*', 'orientadores.*')->get();
        }
        return view('aluno.dados_orientador', ['user' => $user, 'orientadores' => $orientadores]);
    }


    //definicoes admin
    public function admin_definicoes(Request $request){
        $user = Auth()->user();
        return view('admin.definicoes', ['user' => $user]);
    }

    public function edit_aluno($id){
            $user = Auth()->user();
            $aluno = Aluno::join('users', 'users.id', 'alunos.user_id')->where('alunos.id', $id)->first();
            
            return view('admin.edit.edit_aluno', ['user' => $user, 'aluno' => $aluno]);
        
    }

    public function edit_admin($id){
        $user = Auth()->user();
        $admin = Admin::where('id', $id)->first();
        $admin_user = User::join('admins', 'admins.user_id','users.id')->where('admins.id', $id)->first();

        return view('admin.edit.edit_admin', ['user' => $user, 'admin' => $admin, 'admin_user' => $admin_user]);
    }
}
