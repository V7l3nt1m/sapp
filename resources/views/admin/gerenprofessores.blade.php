@extends('layouts.adminlayouts')

@section('content')

@if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
@elseif(session('erro'))
<h1 style="font-size: 18px;
      background-color: red;
      width: 100%;
      border: 1px solid red;
      text-align: center;
      color: #155724;
      font-style: italic;
      margin-bottom: 0;
      padding: 10px;">
        {{session('erro')}}
      </h1>
@endif

<h2 style="text-align: center">Gerenciando Professores do Sistema</h2>



<div class="container-fluid">
  <div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto my-auto">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <form action="" method="GET">
                    <input type="text" class="form-control" placeholder="Pesquise aqui..." name="search">
                  </form>
                </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <input type="file" class="form-control" placeholder="">
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  
  <div class="container-fluid">
    <div class="card shadow-lg mx-4 card-profile-bottom">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome / Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Curso</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logado</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hora de Login</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hora de Logout</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acções  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($professores as $professor)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="/img/professores/{{$professor->imagem_professor}}" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <p class="mb-0 text-primary">{{$professor->nome_completo}}</p>
                        <p class="text-xs text-secondary mb-0">{{$professor->email}}</p>
                      </div>

  
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$professor->curso}}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    @if($professor->estado == 1)
                    <span class="badge bg-gradient-success">
                      Activa
                    </span>
                      @else
                      <span class="badge bg-gradient-danger">
                      Bloqueada
                    </span>
                      @endif
                  </td>
  
                  <td class="align-middle text-center text-sm">
                    @if(DB::table('sessions')->where('user_id', $professor->userid)->first())
                    <span class="badge bg-gradient-success">
                      Logado
                    </span>
                      @else
                      <span class="badge bg-gradient-warning">
                      Deslogado
                    </span>
                      @endif
                  </td>
  
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">
                      {{$professor->hora_login}}
                    </span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> {{$professor->hora_logout}}</span>
                  </td>
                  
                  <td class="align-middle text-center">
                      <button class="btn btn-sm bg-gradient-primary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Acções
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/admin/edit_professor/{{$professor->id}}" style="color: #004d8b;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg> Actualizar
                      </a></li>
                        <li>
                          @if($professor->estado == "1")
                          <form action="/admin/lock/{{$professor->userid}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn" style="width: 100%">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                              </svg> Bloquear
                            </button>
                          </form>
                          @else
                          <form action="/admin/unlock/{{$professor->userid}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn" style="width: 100%">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                              </svg> Desbloquear
                            </button>
                          </form>
                          @endif</li>
  
                        <li>
                          <form action="/admin/delete/professor/{{$professor->userid}}" method="POST">
                            @csrf
                          @method('DELETE')
                          <button type="submit" class="btn"  style="width: 100%; color:#004d8b;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg> Eliminar
                          </button>
                        </form></li>
                      </ul>
                  </td>
                </tr>
  
                @endforeach
              </tbody>
              
            </table>
        
  
      </div>
    </div>
    </div>
 
<!--
<div class="">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Curso</th>
        <th>Estado</th>
        <th>Logado</th>
        <th>Hora do Login</th>
        <th>Hora do Logout</th>
        <th>Acções</th>
      </thead>
      <tbody>
        @foreach($professores as $professore)
        <tr>
          <td>{{$professore->id}}</td>
          <td>{{$professore->nome_completo}}</td>
          <td>{{$professore->email}}</td>
          <td>{{$professore->curso}}</td>
          @if($professore->estado == 1)
          <td>Activa</td>
          @else
          <td>Bloqueada</td>
          @endif
          @if(DB::table('sessions')->where('user_id', $professore->userid)->first())
          <td>Logado</td>
          @else
          <td>Deslogado</td>
          @endif
          <td>{{$professore->hora_login}}</td>
          <td>{{$professore->hora_logout}}</td>
  
          <td>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="/template/#" data-toggle="dropdown" id="profileDropdown">

                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    @if($professore->estado == "1")
                    <form action="/admin/lock/{{$professore->userid}}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn" style="width: 100%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg> Bloquear
                      </button>
                    </form>
                    @else
                    <form action="/admin/unlock/{{$professore->userid}}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn" style="width: 100%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                          <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                        </svg> Desbloquear
                      </button>
                    </form>
                    @endif
                  </a>
                  
                  <a class="dropdown-item" href="/admin/edit_professor/{{$professore->id}}" style="background-color: #004d8b;">
                    <button type="submit" class="btn" style="width: 100%">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg> Actualizar
                    </button>
                </a>

                  <a class="dropdown-item" style="background-color: red;">
                    <form action="/admin/delete/professor/{{$professore->userid}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn"  style="width: 100%; color:#004d8b;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg> Eliminar
                      </button>
                    </form>
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
-->

@endsection