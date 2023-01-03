@extends('layouts.adminlayouts')
@section('content')

<div class="container">
    <h2>Dashboard</h2>
</div>

<div class="container-fluid" style="padding-top: 30px">
    <div class="card shadow-lg mx-4 card-profile-bottom"  style="background: url('/img/waves.png'); background-repeat: no-repeat; background-position: center bottom; background-size: 100% 100%; heigth: 100%">
      <div class="card-body p-3">
            <div class="row" style="padding-top: 80px; padding-left: 30px; ">
                <div class="col-md-6">
                    <h4>Bem vindo, {{$user->name}}</h4>
                    <p>Desejamos para você um bom trabalho!, <br> Se não for a sua primeira vez aqui, seja bem-vindo novamente <br> Administre o Sistema com segurança, sabedoria e cautela</p>
                </div>

                <div class="col-md-6">
                    <img src="/img/teaching.svg" alt="" class="img-fluid">
                </div>
            </div>
    </div>
</div>
</div>


@endsection

