@extends('layouts.adminlayouts')

@section('boas_vindas')

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

<h2 style="text-align: center">Gerenciando orientadores do Sistema</h2>

<div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Cadeira</th>
        <th>Estado</th>
        <th>Logado</th>
        <th>Hora do Login</th>
        <th>Hora do Logout</th>
        <th>Acções</th>
      </thead>
      <tbody>
        @foreach($orientadores as $orientadore)
        <tr>
          <td>{{$orientadore->id}}</td>
          <td>{{$orientadore->nome_completo}}</td>
          <td>{{$orientadore->email}}</td>
          <td>{{$orientadore->cadeira}}</td>

          @if($orientadore->estado == 1)
          <td>Activa</td>
          @else
          <td>Bloqueada</td>
          @endif
          @if(DB::table('sessions')->where('user_id', $orientadore->userid)->first())
          <td>Logado</td>
          @else
          <td>Deslogado</td>
          @endif
          <td>{{$orientadore->hora_login}}</td>
          <td>{{$orientadore->hora_logout}}</td>
  
          <td>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="/template/#" data-toggle="dropdown" id="profileDropdown">

                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    @if($orientadore->estado == "1")
                    <form action="/admin/lock/{{$orientadore->userid}}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn" style="width: 100%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg> Bloquear
                      </button>
                    </form>
                    @else
                    <form action="/admin/unlock/{{$orientadore->userid}}" method="POST">
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
                  
                  <a class="dropdown-item">
                    <form action="/orientadore/delete/orientadore/{{$orientadore->userid}}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn" style="width: 100%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg> Actualizar
                      </button>
                    </form>
                  </a>
                  <a class="dropdown-item">
                    <form action="/admin/delete/orientador/{{$orientadore->userid}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn" style="width: 100%">
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
  </div

@endsection