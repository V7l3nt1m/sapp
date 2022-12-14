<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Aluno;
use App\Models\Admin;
use App\Models\User;
use App\Models\Professore;
use App\Models\Orientadore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\ProfessorImport;



class CadastroController extends Controller
{

    public function store_adminis(Request $request)
    {
        $query1 = DB::table('users')->orderBy('id', 'desc')->limit(1)->get();

        $query2 = DB::table('users')->orderBy('id', 'desc')->limit(1)->first();

        $request->validate(
            [
                'nome_de_usuario' => 'min:2|string|unique:users,nomeusuario',
                'nome_completo' => 'min:2|string',
                'email' => 'email|unique:professores|unique:users',
                'image' => 'required|mimes:jpg,bmp,png',
            ]
        );


        $user = new User;
        $user->name = $request->nome_completo;
        $user->nomeusuario = $request->nome_de_usuario;
        $user->email = $request->email;
        $user->password = Hash::make("Admin2022");
        $user->permissao = "admin";


        $admin = new Admin;
        $admin->nome = $request->nome_completo;
        $admin->email = $request->email;
        $admin->palavra_passe = Hash::make("Admin2022");
        $admin->genero = $request->genero;

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/admins'), $imageName);

        $admin->imagem_admin = $imageName;


            if(count($query1) == 0){
                $user->id = 1;
                $admin->user_id = $user->id;


                $user->save();
                $admin->save();

                return back()->with('msg', "Cadastro feito com sucesso!");
            }else{
                $user->id = $query2->id + 1;
                $admin->user_id = $user->id;

                $user->save();
                $admin->save();

                return back()->with('msg', "Cadastro feito com sucesso!");
            }
            return back()->with('msg', "Cadastro feito com sucesso!");
    }

    public function store_alunos(Request $request)
    {
        $query1 = DB::table('users')->orderBy('id', 'desc')->limit(1)->get();

        $query2 = DB::table('users')->orderBy('id', 'desc')->limit(1)->first();

        $request->validate([
                'primeiro_nome' => 'min:2|string',
                'ultimo_nome' => 'min:2|string',
                'nome_de_usuario' => 'min:2|string',
                'nome_completo' => 'min: 2|string',
                'email' => 'email|unique:professores|unique:users',
                'data_de_nascimento' => 'date|before:01/01/2006',
                'image' => 'required|mimes:jpg,bmp,png',
                'telefone' => 'integer|between: 900000000, 999999999',
                'numero de processo' => 'unique:alunos|unique:users',
            ]);
         

        $user = new User;
        $user->name = $request->nome_completo;
        $user->nomeusuario = $request->nome_de_usuario;
        $user->email = $request->email;
        $user->password = Hash::make("aluno2022");
        $user->permissao = "aluno";


        $aluno = new Aluno;
        $aluno->n_processo = $request->processo;
        $aluno->primeiro_nome = $request->primeiro_nome;
        $aluno->ultimo_nome = $request->ultimo_nome;
        $aluno->nome_completo = $request->nome_completo;
        $aluno->data_nasc = $request->data_de_nascimento;
        $aluno->email = $request->email;
        $aluno->telefone = $request->telefone;
        $aluno->curso = $request->curso;
        $aluno->palavra_passe = Hash::make("aluno2022");
        $aluno->turma = $request->turma;
        $aluno->genero = $request->genero;

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

                return back()->with('msg', "Cadastro feito com sucesso!");
            }else{
                $user->id = $query2->id + 1;
                $aluno->user_id = $user->id;

                $user->save();
                $aluno->save();

                return back()->with('msg', "Cadastro feito com sucesso!");
            }
            return back()->with('msg', "Cadastro feito com sucesso!");


    }

    public function store_alunos2(Request $request){

        try {
            Excel::import(new UsersImport($request->turma, $request->curso), $request->file('arquivo'));
        } catch (\Throwable $th) {
            return back()->with('erro', 'Ocorreu um erro, verifique os dados!');
        }
        return back()->with('msg', 'Cadastro feito com sucesso!');

    }


    public function store_professor(Request $request){
        $query1 = DB::table('users')->orderBy('id', 'desc')->limit(1)->get();

        $query2 = DB::table('users')->orderBy('id', 'desc')->limit(1)->first();

        $request->validate(
            [
                'primeiro_nome' => 'min:2|string',
                'ultimo_nome' => 'min:2|string',
                'nome_completo' => 'min:2|string',
                'nome_de_usuario' => 'min:2|string|unique:users,nomeusuario',
                'email' => 'email|unique:professores|unique:users',
                'data_de_nascimento' => 'date|before:01/01/2005',
                'image' => 'required|mimes:jpg,bmp,png,svg',
                'telefone' => 'integer|between: 900000000, 999999999',
            ]

        );


        $user = new User;
        $user->name = $request->primeiro_nome." ".$request->ultimo_nome;
        $user->email = $request->email;
        $user->nomeusuario = $request->nome_de_usuario;
        $user->password = Hash::make("professor2022");
        $user->permissao = "professor";


        $professor = new Professore;
        $professor->primeiro_nome = $request->primeiro_nome;
        $professor->ultimo_nome = $request->ultimo_nome;
        $professor->nome_completo = $request->nome_completo;
        $professor->data_nasc = $request->data_de_nascimento;
        $professor->email = $request->email;
        $professor->telefone = $request->telefone;
        $professor->palavra_passe = Hash::make("professor2022");
        $professor->curso = $request->curso;
        $professor->genero = $request->genero;


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

                return back()->with('msg', "Cadastro feito com sucesso!");
            }else{
                $user->id = $query2->id + 1;
                $professor->user_id = $user->id;

                $user->save();
                $professor->save();

                return back()->with('msg', "Cadastro feito com sucesso!");
            }
            return back()->with('msg', "Cadastro feito com sucesso!");
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
            return back()->with('msg', 'Informa????es Alteradas com Sucesso!');
        }else {
                return back()->with('erro', 'As senhas n??o coicidem!');

            }

    }

    public function store_professor2(Request $request){
        try {
            Excel::import(new ProfessorImport, $request->file('arquivo'));
        } catch (\Throwable $th) {
            return back()->with('erro', 'Ocorreu um erro, verifique os dados!');
        }
        return back()->with('msg', 'Cadastro feito com sucesso!');

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

            return back()->with('msg', 'Informa????es Alteradas com Sucesso!');
        } else {
            return back()->with('erro', 'As senhas n??o coicidem!');
        }

    }

}
