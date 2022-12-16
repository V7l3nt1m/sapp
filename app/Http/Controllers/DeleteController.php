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

class DeleteController extends Controller
{
    public function destroy_admin($id){
        Admin::where('user_id', $id)->delete();
        User::where('id', $id)->delete();

        return back()->with('msg', 'Usuário Eliminado com sucesso!');

    }
}
