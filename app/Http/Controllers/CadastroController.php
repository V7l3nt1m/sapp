<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;
use App\Models\Professore;
use App\Models\Orientadore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class CadastroController extends Controller
{
    public function cadastro_aluno(){
        return view('cadastro.alunos');
    }
    public function cadastro_professor(){
        return view('cadastro.professor');
    }

    public function store_alunos(Request $request)
    {
        $query1 = DB::table('users')->orderBy('id', 'desc')->limit(1)->get();

        $query2 = DB::table('users')->orderBy('id', 'desc')->limit(1)->first();

        $request->validate(
            [
                'primeiro nome' => 'min:2|string',
                'ultimo nome' => 'min:2|string',
                'nome completo' => 'min:2|string',
                'email' => 'email|unique:professores|unique:users',
                'data de nascimento' => 'date|before:01/01/2006',
                'image' => 'required|mimes:jpg,bmp,png',
                'telefone' => 'integer|between: 900000000, 999999999',
                'numero de processo' => 'unique:alunos|unique:users',
            ]


        );


        $user = new User;
        $user->name = $request->processo;
        $user->email = $request->email;
        $user->password = Hash::make("aluno2022");
        $user->permissao = "aluno";


        $aluno = new Aluno;
        $aluno->n_processo = $request->processo;
        $aluno->primeiro_nome = $request->primeiro_nome;
        $aluno->ultimo_nome = $request->ultimo_nome;
        $aluno->nome_completo = $request->nome_completo;
        $aluno->data_nasc = $request->data_nasc;
        $aluno->email = $request->email;
        $aluno->telefone = $request->telefone;
        $aluno->curso = $request->curso;
        $aluno->palavra_passe = "aluno2022";


            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/alunos'), $imageName);

            $aluno->imagem_aluno = $imageName;

            if(count($query1) == 0){
                $user->id = 1;
                $aluno->user_id = $user->id;


                $user->save();
                $aluno->save();

                return redirect('/login')->with('msg', "Cadastro feito com sucesso!");
            }else{
                $user->id = $query2->id + 1;
                $aluno->user_id = $user->id;

                $user->save();
                $aluno->save();

                return redirect('/login')->with('msg', "Cadastro feito com sucesso!");
            }
            return redirect('/login')->with('msg', "Cadastro feito com sucesso!");


    }

    public function store_orientador(Request $request)
    {
        $user = Auth()->user();
        $aluno = Aluno::where('user_id', $user->id)->first();
        $query1 = DB::table('users')->orderBy('id', 'desc')->limit(1)->get();

        $query2 = DB::table('users')->orderBy('id', 'desc')->limit(1)->first();

        $query3 = DB::table('orientadores')->orderBy('id', 'desc')->limit(1)->get();

        $query4 = DB::table('orientadores')->orderBy('id', 'desc')->limit(1)->first();


        $request->validate(
            [
                'primeiro nome' => 'min:2|string:255',
                'ultimo nome' => 'min:2|string:255',
                'nome completo' => 'min:2|string: 255',
                'email' => 'email|unique:professores|unique:users',
                'image' => 'required|mimes:jpg,bmp,png,svg',
                'telefone' => 'integer|between: 900000000, 999999999',
                'cadeira' => 'min:2|string: 255',
            ]

        );

        $user = new User;

        $user->name = $request->primeiro_nome ." ". $request->ultimo_nome;
        $user->email = $request->email;
        $user->password = Hash::make("orientador2022");
        $user->permissao = "orientador";

        $orientador = new Orientadore;
        $orientador->primeiro_nome = $request->primeiro_nome;
        $orientador->ultimo_nome = $request->ultimo_nome;
        $orientador->nome_completo = $request->nome_completo;
        $orientador->email = $request->email;
        $orientador->telefone = $request->telefone;
        $orientador->cadeira = $request->cadeira;
        $orientador->palavra_passe = "orientador2022";

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/orientadores'), $imageName);

        $orientador->imagem_orientador = $imageName;

        if (count($query1) == 1) {
            $user->id = $query2->id + 1;
            $orientador->user_id = $user->id;

            $user->save();
            $orientador->save();

            if (count($query3) == 1) {
                DB::table('alunos')->where('user_id', Auth()->user()->id)->update(['orientadore_id' => $query4->id + 1]);
            }else{
                DB::table('alunos')->where('user_id', Auth()->user()->id)->update(['orientadore_id' => 1]);
            }


            return redirect('/aluno')->with('msg', 'Cadastro feito com Sucesso!');
        }
        return redirect('/aluno')->with('msg', 'Cadastro feito com Sucesso!');
    }


    public function store_professor(Request $request){
        $query1 = DB::table('users')->orderBy('id', 'desc')->limit(1)->get();

        $query2 = DB::table('users')->orderBy('id', 'desc')->limit(1)->first();

        $request->validate(
            [
                'primeiro nome' => 'min:2|string',
                'ultimo nome' => 'min:2|string',
                'nome completo' => 'min:2|string',
                'email' => 'email|unique:professores|unique:users',
                'data de nascimento' => 'date|before:01/01/2005',
                'image' => 'required|mimes:jpg,bmp,png,svg',
                'telefone' => 'integer|between: 900000000, 999999999',
            ]

        );


        $user = new User;
        $user->name = $request->primeiro_nome." ".$request->ultimo_nome;
        $user->email = $request->email;
        $user->password = Hash::make("professor2022");
        $user->permissao = "professor";


        $professor = new Professore;
        $professor->primeiro_nome = $request->primeiro_nome;
        $professor->ultimo_nome = $request->ultimo_nome;
        $professor->nome_completo = $request->nome_completo;
        $professor->data_nasc = $request->data_nasc;
        $professor->email = $request->email;
        $professor->telefone = $request->telefone;
        $professor->palavra_passe = "professor2022";
        $professor->cadeira = "PT";


            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/professores'), $imageName);

            $professor->imagem_professor = $imageName;

            if(count($query1) == 0){
                $user->id = 1;
                $professor->user_id = $user->id;


                $user->save();
                $professor->save();

                return redirect('/login')->with('msg', "Cadastro feito com sucesso!");
            }else{
                $user->id = $query2->id + 1;
                $professor->user_id = $user->id;

                $user->save();
                $professor->save();

                return redirect('/login')->with('msg', "Cadastro feito com sucesso!");
            }
            return redirect('/login')->with('msg', "Cadastro feito com sucesso!");
    }


    public function store_sala(Request $request){
        $user = Auth()->user();
        $professor = Professore::where('user_id', $user->id)->first();

        $request->validate(
            [
                'turma' => 'required|min:1|max:4',
                'curso' => 'required',
                'id_sala' => 'required|unique:salas|min:5',
                'senha' => 'required|min:10'
            ]

        );
        $sala = new Sala;
        $sala->curso = $request->curso;
        $sala->turma = $request->turma;
        $sala->professore_id = $professor->id;
        $sala->id_sala = $request->id_sala;
        $sala->senha = $request->senha;
        $sala->save();

        return redirect('/professor/sala/criar')->with('msg', 'Sala Criada');

    }

    public function update_definicoes(Request $request)
    {

        if ($request->palavra_passe1 == $request->palavra_passe2) {
            DB::table('professores')->where('id', $request->professor_id)->update(['palavra_passe' => $request->palavra_passe1]);

            DB::table('professores')->where('id', $request->professor_id)->update($request->except(['_token', '_method', 'image', 'palavra_passe1', 'palavra_passe2']));

            DB::table('users')->where('id', Auth()->user()->id)->update(['name' => $request->primeiro_nome." ".$request->ultimo_nome]);
            DB::table('users')->where('id', Auth()->user()->id)->update(['email' => $request->email]);
            DB::table('users')->where('id', Auth()->user()->id)->update(['password' => Hash::make($request->palavra_passe1)]);


            if ($request->hasfile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->image;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $requestImage->move(public_path('img/professores'), $imageName);

                DB::table('professores')->where('id', $request->professor_id)->update(['imagem_professor' => $imageName]);

            }
            return back()->with('msg', 'Informações Alteradas com Sucesso!');
        }else {
                return back()->with('erro', 'As senhas não coicidem!');

            }

    }


    public function update_definicoes_aluno(Request $request)
    {

        $user = auth()->user();
        $email = DB::table('alunos')->select('email')->where('user_id', auth()->user()->id)->first();



        if(strcasecmp($request->email, $email->email) == 0 || strcasecmp($request->email, $user->email) == 0){
            $request->validate(
                [
                    'palavra-passe' => 'min:9|string',
                ]
            );
        }else{
            $request->validate(
                [
                                    'email' => 'unique:users|unique:alunos',
                                    'palavra-passe' => 'min:9|string',

                ]

            );
        }



        if ($request->palavra_passe1 == $request->palavra_passe2) {
            DB::table('alunos')->where('id', $request->aluno_id)->update(['palavra_passe' => $request->palavra_passe1]);
            DB::table('users')->where('id', Auth()->user()->id)->update(['password' => Hash::make($request->palavra_passe1)]);

            DB::table('users')->where('id', Auth()->user()->id)->update(['email' => $request->email]);
            DB::table('alunos')->where('id', $request->aluno_id)->update(['email' => $request->email]);

            return back()->with('msg', 'Informações Alteradas com Sucesso!');
        } else {
            return back()->with('erro', 'As senhas não coicidem!');
        }

    }

    public function login_sala(Request $request){
        $sala = Sala::where('id_sala', $request->id_sala)->where('senha', $request->senha)->first();
        $query = Sala::where('id_sala', $request->id_sala)->where('senha', $request->senha)->get();

        if(count($query) == 0){
            return back()->with('erro', 'A Sala não foi encontrada!');
        }else{
            DB::table('alunos')->where('user_id', auth()->user()->id)->update(['sala_id' => $sala->id]);
            return redirect('/aluno');
        }
    }

    public function delete_aluno_sala($id_aluno){
        Aluno::where('id', $id_aluno)->update(['sala_id' => NULL]);

        return back()->with('msg', 'Aluno Eliminado com sucesso!,');
    }
}
