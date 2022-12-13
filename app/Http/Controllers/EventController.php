<?php

namespace App\Http\Controllers;
use App\Models\Sala;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;
use App\Models\Professore;
use App\Models\Orientadore;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class EventController extends Controller
{
    public function lock_user($id){
        DB::table('users')->where('id', $id)->update(['estado' => 0]);
        DB::table('sessions')->where('user_id', $id)->delete();

        return back()->with('msg', 'Usuario bloqueado com sucesso!');
    }
    public function unlock_user($id){
        DB::table('users')->where('id', $id)->update(['estado' => 1]);

        return back()->with('msg', 'Usuario Desbloqueado com sucesso!');
    }
    public function destroy_user($id){
        $permissao = User::where('id', $id)->select('permissao')->first();
        echo $permissao;
        if($permissao->permissao == "aluno"){
            Aluno::where('user_id', $id)->delete();
            User::where('id', $id)->delete();
            return back()->with('msg', 'Usuario Eliminado com sucesso!');
        }elseif($permissao->permissao == "professor"){

            DB::table('salas')->join('professores', 'professores.id', 'salas.professore_id')->where('professores.user_id', $id)->delete();
            Professore::where('user_id', $id)->delete();
            User::where('id', $id)->delete();
            return back()->with('msg', 'Usuario Eliminado com sucesso!');
        }elseif($permissao->permissao == "orientador"){
            Orientadore::where('user_id', $id)->delete();
            User::where('id', $id)->delete();
            return back()->with('msg', 'Usuario Eliminado com sucesso!');
        }

    }
}
