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

<div class="background">
    <div class=" d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class=" mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h3>Cadastre outros Administradores</h3>
            <h6 class="font-weight-light" style="
            margin-top: 20px !important;
        ">Preencha os dados corretamente.</h6>
              <form class="pt-3" method="POST" action="{{route('admin_cadastro_admin')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" class="@error('primeiro nome') is-invalid @enderror" required name="primeiro_nome" id="input-field" placeholder="Primeiro Nome" onkeyup="validate();">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" class="@error('ultimo nome') is-invalid @enderror" required name="ultimo_nome" id="input-field2" placeholder="Ultimo Nome" onkeyup="validate();">
                          </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" class="@error('nome completo') is-invalid @enderror" required name="nome_completo" id="input-field3" placeholder="Nome Completo" onkeyup="validate();">
                </div>

                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" class="@error('email') is-invalid @enderror" required id="exampleInputEmail1" placeholder="Email">
                </div>

                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg" class="@error('nomeusuario') is-invalid @enderror" required name="nome_user" id="input-field3" placeholder="Nome de usuário" title="username de inicio de sessão" onkeyup="validate();">
                        </div>
                  


                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Cadastrar</button>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>

@endsection

@section('section')

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
