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
        $usuarios = DB::table('users')->join('admins', 'admins.user_id', 'users.id')->where('users.id', $user->id)->first();

        if($search){
            $admins = Admin::join('users', 'admins.user_id', 'users.id')->select('users.id as userid', 'users.*', 'admins.*')
            ->where('admins.nome', 'like', '%'.$search.'%')
            ->get();
        }else{
            $admins = Admin::join('users', 'admins.user_id', 'users.id')->select('users.id as userid', 'users.*', 'admins.*')->get();
        }
        return view('admin.gerenadmins', ['user' => $user, 'admins' => $admins, 'usuarios' => $usuarios]);
    }

    public function gerenaluno(Request $request){
        $user = Auth()->user();
        $search = $request->search;
        $usuarios = DB::table('users')->join('admins', 'admins.user_id', 'users.id')->where('users.id', $user->id)->first();

        if($search){
            $alunos = Aluno::join('users', 'alunos.user_id', 'users.id')->select('users.id as userid', 'users.*', 'alunos.*')
            ->where('alunos.nome_completo', 'like', '%'.$search.'%')
            ->get();
        }else{
            $alunos = Aluno::join('users', 'alunos.user_id', 'users.id')->select('users.id as userid', 'users.*', 'alunos.*')->get();
        }
        return view('admin.gerenalunos', ['user' => $user, 'alunos' => $alunos, 'usuarios' => $usuarios]);
    }

    public function gerenprofessor(Request $request){
        $user = Auth()->user();
        $search = $request->search;
        $usuarios = DB::table('users')->join('admins', 'admins.user_id', 'users.id')->where('users.id', $user->id)->first();

        if($search){
            $professores = Professore::join('users', 'professores.user_id', 'users.id')->select('users.id as userid', 'users.*', 'professores.*')
            ->where('professores.nome_completo', 'like', '%'.$search.'%')
            ->orWhere('professores.curso', 'like', '%'.$search.'%')
            ->get();
        }else{
            $professores = Professore::join('users', 'professores.user_id', 'users.id')->select('users.id as userid', 'users.*', 'professores.*')->get();
        }
        return view('admin.gerenprofessores', ['user' => $user, 'professores' => $professores, 'usuarios' => $usuarios]);
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
            $usuarios = DB::table('users')->join('admins', 'admins.user_id', 'users.id')->where('users.id', $user->id)->first();


            return view('admin.edit.edit_aluno', ['user' => $user, 'aluno' => $aluno, 'usuarios' => $usuarios]);
        
    }

    public function edit_admin($id){
        $user = Auth()->user();
        $admin = Admin::join('users', 'users.id', 'admins.user_id')->where('admins.id', $id)->first();
        $usuarios = DB::table('users')->join('admins', 'admins.user_id', 'users.id')->where('users.id', $user->id)->first();

        return view('admin.edit.edit_admin', ['user' => $user, 'admin' => $admin, 'usuarios' => $usuarios]);
    }


    public function gerenalunos(Request $request){
        $user = Auth()->user();
        $professor = Professore::join('users', 'users.id', 'professores.user_id')->where('professores.user_id', $user->id)->first();

        $search = $request->search;

        if($search){
          $alunos = Aluno::where([
            ['nome_completo', 'like', '%'.$search.'%']
          ])->orWhere([
            ['turma', 'like', '%'.$search.'%']
          ])->orwhere('genero', 'like', '%'.$search.'%')
          ->get();
          }else{
            $alunos = Aluno::where('curso', $professor->curso)->orderBy('turma')->orderBy('nome_completo')->get();
          }

        return view('professor.gerenalunos', ['user' => $user, 'alunos' => $alunos, 'professor' => $professor]);
    }

    public function gerenorientadores(Request $request){
        $user = Auth()->user();
        $professor = Professore::join('users', 'users.id', 'professores.user_id')->where('professores.user_id', $user->id)->first();

        $search = $request->search;

        if($search){
          $orientadores = Aluno::where([
            ['nome_completo', 'like', '%'.$search.'%']
          ])->orWhere([
            ['turma', 'like', '%'.$search.'%']
          ])->orwhere('genero', 'like', '%'.$search.'%')
          ->join('')->get();
          }else{
            $orientadores = Orientadore::where('orientadores.curso', $professor->curso)->orderBy('orientadores.nome_completo')
           ->join('alunos', 'orientadores.id', 'alunos.orientadore_id')
            ->get();
          }

        return view('professor.gerenorientadores', ['user' => $user, 'orientadores' => $orientadores, 'professor' => $professor]);
    }

    public function edit_professor($id){
        $user = Auth()->user();
        $professor = Professore::where('id', $id)->first();
        $professor_user = User::join('professores', 'professores.user_id','users.id')->where('professores.id', $id)->first();
        $usuarios = DB::table('users')->join('admins', 'admins.user_id', 'users.id')->where('users.id', $user->id)->first();

        return view('admin.edit.edit_professor', ['user' => $user, 'professor' => $professor, 'professor_user' => $professor_user, 'usuarios' => $usuarios]);
    }

    public function admin_perfil(Request $request){
        $user = auth()->user();

        $usuarios = DB::table('users')->join('admins', 'admins.user_id', 'users.id')->where('users.id', $user->id)->first();

        return view('admin.perfil', ['user' => $user, 'usuarios' => $usuarios]);
    }

}
