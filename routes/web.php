<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CadastroController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/register', [MainController::class, 'register']);
Route::get('/cadastro/aluno', [CadastroController::class, 'cadastro_aluno']);
Route::post('/cadastro/aluno', [CadastroController::class, 'store_alunos']);

Route::get('/cadastro/professor', [CadastroController::class, 'cadastro_professor']);
Route::post('/cadastro/professor', [CadastroController::class, 'store_professor']);

//aluno
Route::get('/login/sala', [MainController::class, 'sala_login'])->middleware('auth');
Route::post('/sala/login', [CadastroController::class, 'login_sala'])->middleware('auth');

Route::get('/aluno', [MainController::class, 'aluno_dashboard'])->middleware('auth');
Route::get('/aluno/orientador/adicionar', [MainController::class, 'add_orientador'])->middleware('auth');
Route::post('/aluno/cadastro/orientador', [CadastroController::class, 'store_orientador'])->middleware('auth');
Route::get('/aluno/definicoes', [MainController::class, 'definicoes_aluno'])->middleware('auth');
Route::put('/aluno/update/{aluno_id}', [CadastroController::class, 'update_definicoes_aluno'])->middleware('auth');

//professor
Route::get('/professor', [MainController::class, 'professor_dashboard'])->middleware('auth');
Route::get('/professor/sala/criar', [MainController::class, 'criar_sala'])->middleware('auth');
Route::post('/cadastro/professor/sala_criar', [CadastroController::class, 'store_sala'])->middleware('auth');
Route::get('/professor/sala/gerenciar', [MainController::class, 'gerensalas'])->middleware('auth');
Route::get('/professor/definicoes', [MainController::class, 'definicoes'])->middleware('auth');
Route::put('/cadastro/professor/{professor_id}', [CadastroController::class, 'update_definicoes'])->middleware('auth');

Route::get('/escolha', [MainController::class, 'escolha']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth()->user();

        if(strcasecmp($user->permissao, "professor") == 0){
            return redirect('/professor');
        }elseif(strcasecmp($user->permissao, "aluno") == 0){
            return redirect('/login/sala');
        }
    })->name('dashboard');
});
