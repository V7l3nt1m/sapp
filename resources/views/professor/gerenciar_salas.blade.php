@extends('layouts.professorlayout')

@section('content')
@if(session('msg'))
    <h1 style="font-size: 18px;
      background-color: #d4edda;
      width: 100%;
      border: 1px solid #c3e6cb;
      text-align: center;
      color: #155724;
      font-style: italic;
      margin-bottom: 0;
      padding: 10px;">
        {{session('msg')}}
      </h1>
    @endif

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Gerenciar Salas</h4>

            <div class="table-responsive">
              <table class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Curso</th>
                        <th>Turma</th>
                        <th>ID da Sala</th>
                        <th>Senha</th>
                        <th>Acções</th>
                    </thead>
                    <tbody>
                        @foreach ($query as $sala)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$sala->curso}}</td>
                            <td>{{$sala->turma}}</td>
                            <td>{{$sala->id_sala}}</td>
                            <td>{{$sala->senha}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>

@endsection
