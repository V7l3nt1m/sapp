<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'n_processo' => ['required', 'unique:alunos', 'number', 'min:5', 'max:5'],
            'primeiro_nome' => ['required', 'string', 'max:255'],
            'ultimo_nome' => ['required', 'string', 'max:255'],
            'nome_completo' => ['required', 'string', 'max:255'],
            'data_nasc' => ['required', 'date', 'before_or_equals:01/01/2006|'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telefone' => ['required'],
            'curso' => ['required'],
            'image' => ['required', 'mimes:jpg,bmp,png,jpeg'],
        ])->validate();
        if ($input->hasfile('image') && $input->file('image')->isValid()) {

            $requestImage = $input['image'];

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/alunos'), $imageName);

            if (count($query2) > 0) {
                return User::create([
                    'id' => $query->id + 1,
                    'name' => $input['n_processo'],
                    'email' => $input['email'],
                    'password' => Hash::make("aluno2022"),
                ]);
            return Aluno::create([
                'n_processo' => $input['n_processo'],
                'primeiro_nome' => $input['primeiro_nome'],
                'ultimo_nome' => $input['ultimo_nome'],
                'nome_completo' => $input['nome_completo'],
                'data_nasc' => $input['data_nasc'],
                'email' => $input['email'],
                'telefone' => $input['telefone'],
                'curso' => $input['curso'],
                'palavra-passe' => "aluno2022",
                'imagem_aluno' => $imageName,
                'user_id' => $query->id,
            ]);
            }else{
                return User::create([
                    'id' => 1,
                    'name' => $input['n_processo'],
                    'email' => $input['email'],
                    'password' => Hash::make("aluno2022"),
                ]);


            return Aluno::create([
                'n_processo' => $input['n_processo'],
                'primeiro_nome' => $input['primeiro_nome'],
                'ultimo_nome' => $input['ultimo_nome'],
                'nome_completo' => $input['nome_completo'],
                'data_nasc' => $input['data_nasc'],
                'email' => $input['email'],
                'telefone' => $input['telefone'],
                'curso' => $input['curso'],
                'palavra-passe' => "aluno2022",
                'imagem_aluno' => $imageName,
                'user_id' => 1,
            ]);
            }




    }
    }
}
