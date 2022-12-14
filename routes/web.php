<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EventController;

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
Route::put('/admin/lock/{id}', [EventController::class, 'lock_user'])->middleware('auth')->middleware('admin');
Route::put('/admin/unlock/{id}', [EventController::class, 'unlock_user'])->middleware('auth')->middleware('admin');
Route::delete('/admin/delete/{id}', [EventController::class, 'destroy_user'])->middleware('auth')->middleware('admin');
Route::get('/admin/adicionar/aluno', [MainController::class, 'addaluno'])->middleware('auth')->middleware('admin')->name('addaluno');
Route::get('/admin/adicionar/professor', [MainController::class, 'addprofessor'])->middleware('auth')->middleware('admin')->name('addprofessor');
Route::get('/admin/adicionar/orientador', [MainController::class, 'addorientador'])->middleware('auth')->middleware('admin')->name('addorientador');
Route::get('/admin/adicionar/cordenadoor', [MainController::class, 'addcordenador'])->middleware('auth')->middleware('admin')->name('addcordenador');
Route::get('/admin/adicionar/adminoutro', [MainController::class, 'addadminoutro'])->middleware('auth')->middleware('admin')->name('addadminoutro');
Route::get('/admin', [MainController::class, 'admin'])->middleware('auth')->middleware('admin')->name('voltaradmin');



Route::get('/', [MainController::class, 'index']);
Route::get('/register', [MainController::class, 'register']);
Route::get('/cadastro/aluno', [CadastroController::class, 'cadastro_aluno']);
Route::post('/cadastro/aluno', [CadastroController::class, 'store_alunos']);

Route::get('/cadastro/professor', [CadastroController::class, 'cadastro_professor']);
Route::post('/cadastro/professor', [CadastroController::class, 'store_professor']);

//aluno
Route::get('/login/sala', [MainController::class, 'sala_login'])->middleware('auth');
Route::post('/sala/login', [CadastroController::class, 'login_sala'])->middleware('auth');

Route::get('/aluno', [MainController::class, 'aluno_dashboard'])->middleware('auth')->middleware('aluno');
Route::get('/aluno/orientador/adicionar', [MainController::class, 'add_orientador'])->middleware('auth')->middleware('aluno');
Route::post('/aluno/cadastro/orientador', [CadastroController::class, 'store_orientador'])->middleware('auth')->middleware('aluno');
Route::get('/aluno/definicoes', [MainController::class, 'definicoes_aluno'])->middleware('auth')->middleware('aluno');
Route::put('/aluno/update/{aluno_id}', [CadastroController::class, 'update_definicoes_aluno'])->middleware('auth')->middleware('aluno');

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
