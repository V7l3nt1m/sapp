@extends('layouts.professorlayout')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Gerenciar Orientadores</h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Genero</th>
                    <th>Telefone</th>
                    <th>Orientando alunos:</th>
                </thead>
                <tbody>
                    @foreach ($orientadores as $orientador)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$orientador->nome_completo}}</td>
                        <td>{{$orientador->email}}</td>
                        <td>{{$orientador->genero}}</td>
                        <td>{{$orientador->telefone}}</td>
                        <td>
                                <ul class="navbar-nav navbar-nav-right">
                                  <li class="nav-item nav-profile dropdown">
                                    <a class="nav-link dropdown-toggle" href="/template/#" data-toggle="dropdown" id="profileDropdown">
                    
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                      <a class="dropdown-item">

                                    </a>
                                    </div>
                                </li>
                            </ul>
                        </td>
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