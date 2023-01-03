<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Professore;

class ProfessorImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        $user_anterior = DB::table('users')->orderBy('id', 'desc')->limit(1)->first();

    foreach ($rows as $row) {
          User::insert([
          'id' => $user_anterior->id+1,
          'name' => $row[0],
          'email' => $row[2],
          'password' => Hash::make('professor2022'),
          'permissao' => "professor",
          'nomeusuario' => $row[2]
          ]);

          Professore::insert([
            'nome_completo' => $row[0],
            'data_nasc' => date('Y-m-d', strtotime($row[1])),
            'email' => $row[2],
            'telefone' => $row[3],
            'imagem_professor' => '2ef32793b4d548165ec8ea44a0a60a10.png',
            'curso' => $row[4],
            'palavra_passe' => Hash::make('professor2022'),
            'genero' => $row[5],
            'pt' => $row[6],
            'user_id' => $user_anterior->id+1,
          ]);

          $user_anterior->id++; 
        } 
    }
}
