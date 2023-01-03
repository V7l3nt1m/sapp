<?php

namespace App\Http\Controllers;

use App\Models\Orientadore;
use App\Models\Sala;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;
use App\Models\Professore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function escolha(){
        return view('escolha');
    }

    public function register(){
        return redirect('/login');
    }

    

    public function aluno_dashboard(){
        $user = Auth()->user();
        $aluno = Aluno::where('user_id', $user->id)->first();

        return view('aluno.dashboard', ['user' => $user, 'aluno' => $aluno ]);
    }

    public function add_orientador(){
        $user = Auth()->user();
        $aluno = Aluno::where('user_id', $user->id)->first();

        return view('aluno.adicionar_ori', ['user' => $user, 'aluno' => $aluno ]);
    }


    public function acessdenied(){
        return view('acessdenied');
    }

    public function professor_dashboard(){
        $user = Auth()->user();
        $professor = Professore::where('user_id', $user->id)->first();


        return view('professor.dashboard', ['user' => $user, 'professor' => $professor ]);
    }

    public function criar_sala(){
        $user = Auth()->user();
        $professor = Professore::where('user_id', $user->id)->first();


        return view('professor.criar_sala', ['user' => $user, 'professor' => $professor ]);
    }

    public function gerensalas(){
        $user = Auth()->user();
        $professor = Professore::where('user_id', $user->id)->first();
        $query = Sala::where('professore_id', $professor->id)->get();

        return view('professor.gerenciar_salas', ['user' => $user, 'professor' => $professor, 'query' => $query ]);
    }

    public function definicoes(){
        $user = Auth()->user();
        $professor = Professore::where('user_id', $user->id)->first();

        return view('professor.definicoes', ['user' => $user, 'professor' => $professor]);
    }

    public function definicoes_aluno(){
        $user = Auth()->user();
        $aluno = Aluno::where('user_id', $user->id)->first();

        return view('aluno.definicoes', ['user' => $user, 'aluno' => $aluno]);
    }

    public function sala_login(){
        return view('sala_login');
    }


    public function admin(Request $request){
            $user = auth()->user();

            $usuarios = DB::table('users')->join('admins', 'admins.user_id', 'users.id')->where('users.id', $user->id)->first();
        return view('admin.dashboard', ['user' => $user, 'usuarios' => $usuarios]);
    }


    public function orientador(){
        $user = Auth()->user();
        $orientador = Orientadore::where('user_id', $user->id)->first();

        return view('orientador.dashboard', ['user' => $user, 'orientador' => $orientador]);
    }

    

    public function addaluno() {
        $user = Auth()->user();

        return view('admin.adicionar_aluno', ['user' => $user]);
    }

    public function addprofessor() {
        $user = Auth()->user();

        return view('admin.adicionar_professor', ['user' => $user]);
    }

    public function addcordenador () {
        $user = Auth()->user();

        return view('admin.adicionar_cordenador', ['user' => $user]);
    }

    public function addorientador () {
        $user = Auth()->user();

        return view('admin.adicionar_orientador', ['user' => $user]);
    }

    public function addadminoutro () {
        $user = Auth()->user();

        return view('admin.adicionar_adminoutro', ['user' => $user]);
    }

   

}
