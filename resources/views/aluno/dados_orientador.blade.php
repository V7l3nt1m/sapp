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
    @foreach($orientadores as $orientadore)
    <table class="table table-hover">
      <thead>
        <th>#</th>
        <th>Primeiro Nome</th>
        <th>Ultimo Nome</th>
        <th>Nome Completo</th>
        <th>Estado</th>
        <th>Logado</th>
        <th>Hora do Login</th>
        <th>Hora do Logout</th>
      </thead>
      <tbody>
        <tr>
          <td>{{$orientadore->id}}</td>
          <td>{{$orientadore->primeiro_nome}}</td>
          <td>{{$orientadore->ultimo_nome}}</td>
          <td>{{$orientadore->nome_completo}}</td>

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
  
        </tr>
      </tbody>
    </table>
    
    <table class="table table-hover">
        <thead>
          <th>Email</th>
          <th>Telefone</th>
          <th>Cadeira</th>
        </thead>
        <tbody>
          <tr>
            <td>{{$orientadore->email}}</td>
            <td>{{$orientadore->telefone}}</td>
            <td>{{$orientadore->cadeira}}</td>

    
          </tr>
        </tbody>
      </table>
    @endforeach
  </div

@endsection