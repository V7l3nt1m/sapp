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

<div class="background">
    <div class=" d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class=" mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h3>Actualizando: {{$admin->nome}}</h3>
            <h6 class="font-weight-light" style="
            margin-top: 20px !important;
        ">Preencha os dados corretamente.</h6>
              <form class="pt-3" method="POST" action="/admin/update_admin/{{$admin->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" class="@error('nome completo') is-invalid @enderror" required name="nome_completo" id="input-field" placeholder="Nome Completo" value="{{$admin->nome}}" onkeyup="validate();">
                </div>

                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" required id="exampleInputEmail1" placeholder="Email" value="{{$admin->email}}">
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <select name="genero" required class="form-control form-control-lg">
                        <option value="" disabled selected>Genero</option>
                        <option value="masculino" {{$admin->genero == "masculino" ? 'selected=selected' : ''}}>Masculino</option>
                        <option value="feminino" {{$admin->genero == "feminino" ? 'selected=selected' : ''}}>Feminino</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    
                            <div class="form-group">
                              <input type="text" class="form-control form-control-lg" class="@error('nomeusuario') is-invalid @enderror" required name="nome_de_usuario" id="input-field3" placeholder="Nome de usuário" title="username de inicio de sessão" onkeyup="validate();" value="{{$admin->nomeusuario}}">
                            </div>
                  </div>
                </div>

                        <div class="form-group">
                            <input type="file" id="image" name="image" class="form-control form-control-lg" class="@error('imagem') is-invalid @enderror" accept="image/*"
                                                onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo" title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
                          </div>
                  
                          <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                              <label for="">Previsualização da Imagem</label>
                              <img id="image-preview"
                              class="img-fluid img-thumbnail rounded d-block" src="/img/admins/{{$admin->imagem_admin}}" width="400px">
                            </div>
                            <div class="col-md-3"></div>
                          </div>

                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Actualizar</button>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>

@endsection

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
