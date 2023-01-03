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

class UpdateController extends Controller
{
    public function admin_definicoes(Request $request){
        $user = auth()->user();

        if ($request->password != $request->password2) {
            return back()->with('erro', 'Palavras passes não coincidem');
        }else{
            if(!Hash::check($request->password, $user->password)) {
                $request->validate([
                    'password' => 'min: 9',
                ]);
                $user->update(['password' => Hash::make($request->password)]);
                Admin::where('user_id', $user->id)->update(['palavra_passe' => Hash::make($request->password)]);
            }
    
            if($user->nomeusuario != $request->nomeusuario){
                $request->validate([
                    'nomeusuario' => 'string|unique:users',
                ]);
                $user->update(['nomeusuario' => $request->nomeusuario]);
            }
            if($user->email != $request->email){
                $request->validate([
                    'email' => 'email|unique:users',
                ]);
                $user->update(['email' => $request->email]);
                Admin::where('user_id', $user->id)->update(['email' => $request->email]);
            }

            Admin::where('user_id', $user->id)->update(['genero' => $request->genero]);

            if ($request->hasfile('image') && $request->file('image')->isValid()) {

                $requestImage = $request->image;
    
                $extension = $requestImage->extension();
    
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                $requestImage->move(public_path('img/admins'), $imageName);

                Admin::where('user_id', $user->id)->update(['imagem_admin' => $imageName]);

                return back()->with('msg', 'Dados actualizados com sucesso!');
            }else{
                return back()->with('msg', 'Dados actualizados com sucesso!');
            }
    
        }
       
    }

    public function update_aluno(Request $request){
        $aluno = Aluno::join('users', 'users.id', 'alunos.user_id')->where('alunos.user_id', $request->id);
        $aluno2 = Aluno::join('users', 'users.id', 'alunos.user_id')->where('alunos.user_id', $request->id)->first();
                    $request->validate(
                [
                    'primeiro_nome' => 'min:2|string',
                    'ultimo_nome' => 'min:2|string',
                    'nome_de_usuario' => 'min:2|string',
                    'nome_completo' => 'min:2|string',
                    'data_de_nascimento' => 'date|before:01/01/2006',
                    'image' => 'mimes:jpg,bmp,png',
                    'telefone' => 'integer|between: 900000000, 999999999',
                ]
    
    
            );
       
         
        if($aluno2->curso != $request->curso){
            $aluno->update([
                'curso' => $request->curso,
            ]);
            $aluno->update([
                'sala_id' => NULL
            ]);
        }
        

        if ($request->hasfile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/alunos'), $imageName);
        
            $aluno->update([
                'primeiro_nome' => $request->primeiro_nome,
                'ultimo_nome' => $request->ultimo_nome,
                'data_nasc' => $request->data_de_nascimento,
                'imagem_aluno' => $imageName,
                'turma' => $request->turma,
            ]);
    
            try {
                $aluno->update([
                    'alunos.email' => $request->email,
                    'users.email' => $request->email,
                ]);
            } catch (\Throwable $th) {
                return back()->with('erro', 'Email já existe');
            }
    
            try {
                $aluno->update([
                    'telefone' => $request->telefone,
                ]);
            } catch (\Throwable $th) {
                return back()->with('erro', 'O numero de telefone já existe!');
            }
    
            try {
                $aluno->update([
                    'n_processo' => $request->processo,
                ]);
            } catch (\Throwable $th) {
                return back()->with('erro', 'O Numero de Processo já existe!');
            }
    
            try {
                $aluno->update(['nomeusuario' => $request->nome_de_usuario]);
            } catch (\Throwable $th) {
                return back()->with('erro', 'O nome de usuário já existe');
            }
    
    }else{
        $aluno->update([
            'primeiro_nome' => $request->primeiro_nome,
            'ultimo_nome' => $request->ultimo_nome,
            'data_nasc' => $request->data_de_nascimento,
            'turma' => $request->turma,
        ]);

        try {
            $aluno->update([
                'alunos.email' => $request->email,
                'users.email' => $request->email,
            ]);
        } catch (\Throwable $th) {
            return back()->with('erro', 'Email já existe');
        }

        try {
            $aluno->update([
                'telefone' => $request->telefone,
            ]);
        } catch (\Throwable $th) {
            return back()->with('erro', 'O numero de telefone já existe!');
        }

        try {
            $aluno->update([
                'n_processo' => $request->processo,
            ]);
        } catch (\Throwable $th) {
            return back()->with('erro', 'O Numero de Processo já existe!');
        }

        try {
            $aluno->update(['nomeusuario' => $request->nome_de_usuario]);
        } catch (\Throwable $th) {
            return back()->with('erro', 'O nome de usuário já existe');
        }
    }
    return back()->with('msg', 'Dados actualizados com sucesso!');
}


public function update_professor(Request $request){
    $professor = Professore::join('users', 'users.id', 'professores.user_id')->where('professores.id', $request->id);
        $professor2 = Professore::join('users', 'users.id', 'professores.user_id')->where('professores.id', $request->id)->first();
                    $request->validate(
                [
                    'primeiro_nome' => 'min:2|string',
                    'ultimo_nome' => 'min:2|string',
                    'nome_de_usuario' => 'min:2|string',
                    'nome_completo' => 'min:2|string',
                    'data_de_nascimento' => 'date|before:01/01/2006',
                    'image' => 'mimes:jpg,bmp,png',
                    'telefone' => 'integer|between: 900000000, 999999999',
                ]
            );

            if($professor2->curso != $request->curso){
                $professor->update([
                    'curso' => $request->curso,
                ]);
            }

            if ($request->hasfile('image') && $request->file('image')->isValid()) {

                $requestImage = $request->image;
    
                $extension = $requestImage->extension();
    
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                $requestImage->move(public_path('img/professores'), $imageName);

                $professor->update([
                    'primeiro_nome' => $request->primeiro_nome,
                    'ultimo_nome' => $request->ultimo_nome,
                    'data_nasc' => $request->data_de_nascimento,
                    'imagem_professor' => $imageName,
                ]);
        
                try {
                    $professor->update([
                        'professores.email' => $request->email,
                        'users.email' => $request->email,
                    ]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'Email já existe');
                }
        
                try {
                    $aluno->update([
                        'telefone' => $request->telefone,
                    ]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'O numero de telefone já existe!');
                }
        
                try {
                    $professor->update(['nomeusuario' => $request->nome_de_usuario]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'O nome de usuário já existe');
                }
            }else{
                $professor->update([
                    'primeiro_nome' => $request->primeiro_nome,
                    'ultimo_nome' => $request->ultimo_nome,
                    'data_nasc' => $request->data_de_nascimento,
                ]);
        
                try {
                    $professor->update([
                        'professores.email' => $request->email,
                        'users.email' => $request->email,
                    ]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'Email já existe');
                }
        
                try {
                    $professor->update([
                        'telefone' => $request->telefone,
                    ]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'O numero de telefone já existe!');
                }
        
                try {
                    $professor->update(['nomeusuario' => $request->nome_de_usuario]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'O nome de usuário já existe');
                }
            }    

    return back()->with('msg', 'Dados actualizados com sucesso!');
}

public function update_admins(Request $request){
    $admin = Admin::join('users', 'users.id', 'admins.user_id')->where('admins.id', $request->id);


    $request->validate(
        [
            'nome_de_usuario' => 'min:2|string',
            'nome_completo' => 'min:2|string',
            'image' => 'mimes:jpg,bmp,png',
        ]
        
    );

        if ($request->hasfile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/admins'), $imageName);

            $admin->update([
                'imagem_admin' => $imageName,
                'admins.nome' => $request->nome_completo,
                'users.name'  => $request->nome_completo,
                ]);

                try {
                    $admin->update([
                        'nomeusuario' => $request->nome_de_usuario, 
                        ]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'O nome de usuário já existe!');
                }

                try {
                    $admin->update([
                        'admins.email' => $request->email,
                        'users.email' => $request->email,
                        ]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'O email já existe!');
                }
        } else{
            $admin->update([
                'admins.nome' => $request->nome_completo,
                'users.name'  => $request->nome_completo,
                ]);

                try {
                    $admin->update([
                        'admins.email' => $request->email,
                        'users.email' => $request->email,
                        ]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'O email já existe!');
                }
                try {
                    $admin->update([
                        'nomeusuario' => $request->nome_de_usuario, 
                        ]);
                } catch (\Throwable $th) {
                    return back()->with('erro', 'O nome de usuário já existe!');
                }
        }

    return back()->with('msg', 'Dados actualizados com sucesso!');
}
}
