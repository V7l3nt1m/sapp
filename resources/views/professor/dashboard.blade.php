@extends('layouts.professorlayout')


@section('content')
<div class="" style="margin-top: -30px;">
    <h3>Olá, caro Professor {{$professor->primeiro_nome}} {{$professor->ultimo_nome}}</h3><br>
    <p class="h5">Tem aqui as ferramentas que precisa para acompanhar cada fase do projecto da PAP dos seus alunos</p><br>
  </div>
@endsection
