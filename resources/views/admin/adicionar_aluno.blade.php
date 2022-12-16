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
            <h3>Cadastrar Aluno</h3>
            <h6 class="font-weight-light" style="
            margin-top: 20px !important;
        ">Preencha os dados corretamente.</h6>
              <form class="pt-3" method="POST" action="{{route('store_alunos')}}" enctype="multipart/form-data">
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

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="date" name="data_nasc" class="form-control form-control-lg" class="@error('data de nascimento') is-invalid @enderror" required id="exampleInputEmail1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="file" id="image" name="image" class="form-control btn form-control required-lg" class="@error('imagem') is-invalid @enderror" accept="image/*"
                    onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo"  required="required" title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" name="processo" class="form-control form-control-lg" class="@error('numero de processo') is-invalid @enderror" required id="exampleInputEmail1" placeholder="Nº de Processo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" name="telefone" class="form-control form-control-lg" class="@error('telefone') is-invalid @enderror" required id="exampleInputEmail1" placeholder="Telefone">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control form-control-lg" required name="curso" id="exampleFormControlSelect2">
                        <option disabled selected>Curso</option>
                        <option value="informatica">Técnico de Informática</option>
                        <option value="multimedia">Sistemas de Multimédia</option>
                        <option value="electronica">Electronica e Telecomunicações</option>
                      </select>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                      <label for="">Previsualização da Imagem</label>
                      <img id="image-preview"
                      class="img-fluid img-thumbnail rounded d-block" width="400px">
                    </div>
                    <div class="col-md-3"></div>
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
