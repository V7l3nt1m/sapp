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

<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="/img/admins/{{$usuarios->imagem_admin}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{$user->name}}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              Administrador do sistema
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <i class="ni ni-email-83"></i>
                  <span class="ms-2">Mensagem</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form action="/admin/perfil/update" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Editar Perfil</p>
              <button class="btn btn-primary btn-sm ms-auto" type="submit">Guardar</button>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">As tuas informações</p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nome de usuário</label>
                  <input class="form-control" type="text" class="@error('nomeusuario') is-invalid @enderror" required name="nomeusuario" value="{{$user->nomeusuario}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email</label>
                  <input class="form-control" type="email" name="email" required value="{{$user->email}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nome completo</label>
                  <input class="form-control" type="text" required class="@error('nome completo') is-invalid @enderror" required name="nome_completo" id="input-field" value="{{$usuarios->nome}}" onkeyup="validate();">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Genero</label>
                    <select class="form-control" name="genero" required id="exampleFormControlSelect1">
                      <option value="masculino" {{$usuarios->genero == "masculino" ? 'selected=selected' : ''}}>Masculino</option>
                      <option value="feminino" {{$usuarios->genero == "feminino" ? 'selected=selected' : ''}}>Feminino</option>
                    </select>
                  </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Palavra-passe</label>
                  <input class="form-control" required type="password" name="password" value="{{$user->password}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Novamente Palavra-passe</label>
                  <input class="form-control" required type="password" name="password2" value="{{$user->password}}">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label for="example-text-input"  class="form-control-label">Atualizar foto de perfil</label>
                    <input type="file" id="image" name="image" class="form-control" class="@error('imagem') is-invalid @enderror" accept="image/*"
                                              onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo" title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
                                              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="card shadow-lg mx-4 card-profile-bottom">
  <div class="card-body p-3">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-5">
      <label for="">Previsualização da Imagem</label>
      <img id="image-preview"
      class="img-fluid img-thumbnail rounded d-block" src="/img/admins/{{$usuarios->imagem_admin}}" width="400px">
    </div>
    <div class="col-md-3"></div>
  </div>
  </div>
  </div>



  <script type="text/javascript">
    function updatePreview(input, target) {
      let file = input.files[0];
      let reader = new FileReader();

      reader.readAsDataURL(file);
      reader.onload = function () {
          let img = document.getElementById(target);
          // can also use "this.result"
          img.src = reader.result;
      }
    }
    </script>


@endsection