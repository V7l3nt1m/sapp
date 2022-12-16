<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\UpdateController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/acessdenied', [MainController::class, 'acessdenied']);

//orientador
Route::get('/orientador', [MainController::class, 'orientador'])->middleware('auth')->middleware('orientador');



Route::get('/admin', [MainController::class, 'admin'])->middleware('auth')->middleware('admin');
Route::put('/admin/lock/{id}', [EventController::class, 'lock_user'])->middleware('auth')->middleware('admin')->name('lock');
Route::put('/admin/unlock/{id}', [EventController::class, 'unlock_user'])->middleware('auth')->middleware('admin');
Route::delete('/admin/delete/{id}', [EventController::class, 'destroy_user'])->middleware('auth')->middleware('admin');
Route::get('/admin/adicionar/orientador', [MainController::class, 'addorientador'])->middleware('auth')->middleware('admin')->name('addorientador');
Route::get('/admin/adicionar/cordenadoor', [GetController::class, 'addcordenador'])->middleware('auth')->middleware('admin')->name('addcordenador');

//admin admins
Route::get('/admin/adicionar/adminoutro', [GetController::class, 'addadminoutro'])->middleware('auth')->middleware('admin')->name('addadminoutro');
Route::post('/admin/cadastro/admin', [CadastroController::class, 'store_adminis'])->middleware('auth')->middleware('admin')->name('admin_cadastro_admin');
Route::get('/admin/gerenciar/admins', [GetController::class, 'gerenadmins'])->middleware('auth')->middleware('admin')->name('admin_gerenciar_admin');
Route::delete('/admin/delete/admins/{id}', [DeleteController::class, 'destroy_admin'])->middleware('auth')->middleware('admin');

//admin alunos
Route::get('/admin/adicionar/aluno', [MainController::class, 'addaluno'])->middleware('auth')->middleware('admin')->name('addaluno');
Route::post('/admin/acadastro/aluno', [CadastroController::class, 'store_alunos'])->middleware('auth')->middleware('admin')->name('store_alunos');
Route::get('/admin/gerenciar/aluno', [GetController::class, 'gerenaluno'])->middleware('auth')->middleware('admin')->name('gerenaluno');

//admin professores

Route::get('/admin/adicionar/professor', [MainController::class, 'addprofessor'])->middleware('auth')->middleware('admin')->name('addprofessor');
Route::post('/admin/cadastro/professor', [CadastroController::class, 'store_professor'])->middleware('auth')->middleware('admin')->name('store_professor');
Route::get('/admin/gerenciar/professor', [GetController::class, 'gerenprofessor'])->middleware('auth')->middleware('admin')->name('gerenprofessor');


//Orientadores
Route::get('/admin/gerenciar/orientador', [GetController::class, 'gerenorientador'])->middleware('auth')->middleware('admin')->name('gerenorientador');



Route::get('/admin', [MainController::class, 'admin'])->middleware('auth')->middleware('admin')->name('voltaradmin');



Route::get('/', [MainController::class, 'index']);

Route::get('/register', [MainController::class, 'register']);
Route::get('/cadastro/aluno', [CadastroController::class, 'cadastro_aluno']);

Route::get('/cadastro/professor', [CadastroController::class, 'cadastro_professor']);

//aluno
Route::get('/login/sala', [MainController::class, 'sala_login'])->middleware('auth');
Route::post('/sala/login', [CadastroController::class, 'login_sala'])->middleware('auth');

Route::get('/aluno', [MainController::class, 'aluno_dashboard'])->middleware('auth')->middleware('aluno');
Route::get('/aluno/orientador/adicionar', [MainController::class, 'add_orientador'])->middleware('auth')->middleware('aluno');
Route::post('/aluno/cadastro/orientador', [CadastroController::class, 'store_orientador'])->middleware('auth')->middleware('aluno');
Route::get('/aluno/definicoes', [MainController::class, 'definicoes_aluno'])->middleware('auth')->middleware('aluno');
Route::put('/aluno/update/{aluno_id}', [CadastroController::class, 'update_definicoes_aluno'])->middleware('auth')->middleware('aluno');
Route::get('/aluno/orientador/dados', [GetController::class, 'dados_orientador'])->name('dados_orientador')->middleware('auth')->middleware('aluno');


//professor
Route::get('/professor', [MainController::class, 'professor_dashboard'])->middleware('auth')->middleware('prof');
Route::get('/professor/sala/criar', [MainController::class, 'criar_sala'])->middleware('auth')->middleware('prof');
Route::post('/cadastro/professor/sala_criar', [CadastroController::class, 'store_sala'])->middleware('auth')->middleware('prof');
Route::get('/professor/sala/gerenciar', [MainController::class, 'gerensalas'])->middleware('auth')->middleware('prof');
Route::get('/professor/definicoes', [MainController::class, 'definicoes'])->middleware('auth')->middleware('prof');
Route::put('/cadastro/professor/{professor_id}', [CadastroController::class, 'update_definicoes'])->middleware('auth')->middleware('prof');
Route::get('/professor/alunos/gerenciar', [MainController::class, 'gerenalunos'])->middleware('auth')->middleware('prof');
Route::delete('/professor/aluno/{id_aluno}', [CadastroController::class, 'delete_aluno_sala'])->middleware('auth')->middleware('prof');

Route::get('/escolha', [MainController::class, 'escolha']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth()->user();
        $aluno = DB::table('alunos')->where('user_id', $user->id)->first();

        if(strcasecmp($user->permissao, "professor") == 0){
            return redirect('/professor');
        }elseif(strcasecmp($user->permissao, "aluno") == 0 && $aluno->sala_id == NULL){
            return redirect('/login/sala');
        }elseif(strcasecmp($user->permissao, "aluno") == 0 && $aluno->sala_id != NULL){
            return redirect('/aluno');
        }
        elseif(strcasecmp($user->permissao, "admin") == 0){
            return redirect('/admin');
        }
        elseif(strcasecmp($user->permissao, "orientador") == 0){
            return redirect('/orientador');
        }
    })->name('dashboard');
});
