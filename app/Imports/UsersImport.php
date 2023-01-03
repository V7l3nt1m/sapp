<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Aluno;

class UsersImport implements ToCollection
{
    protected $turma;
    protected $curso;
    
    /**
    * @param Collection $collection
    */
    function __construct($turma, $curso) {
        $this->turma = $turma;
        $this->curso = $curso;
 }
    public function collection(Collection $rows)
    {
        $user_anterior = DB::table('users')->orderBy('id', 'desc')->limit(1)->first();
        foreach ($rows as $row) 
        {
            User::insert([
                'id' => $user_anterior->id+1,
                'name' => $row[1],
                'email' => $row[3],
                'password' => Hash::make("aluno2022"),
                'permissao' => "aluno",
                'nomeusuario' => $row[0],
            ]);

            Aluno::insert([
                'n_processo' => intval($row[0]),
                'nome_completo' => $row[1],
                'data_nasc' => date('Y-m-d', strtotime($row[2])),
                'email' => $row[3],
                'imagem_aluno' => '7e61f3c03110f4d9f6ca3985d7fe5cb8.png',
                'curso' => $this->curso,
                'turma' => $this->turma,
                'palavra_passe' => Hash::make("aluno2022"),
                'genero' => $row[4],
                'user_id' => $user_anterior->id+1,
            ]);

            $user_anterior->id++;

        }
    }
}
