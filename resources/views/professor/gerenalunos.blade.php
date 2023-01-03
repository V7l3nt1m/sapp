@extends('layouts.professorlayout')

@section('content')
    
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Gerenciar Alunos</h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Nº de processo</th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Genero</th>
                    <th>Turma</th>
                </thead>
                <tbody>
                    @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$aluno->n_processo}}</td>
                        <td>{{$aluno->nome_completo}}</td>
                        <td>{{$aluno->email}}</td>
                        <td>{{$aluno->genero}}</td>
                        <td>{{$aluno->turma}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

@endsection
