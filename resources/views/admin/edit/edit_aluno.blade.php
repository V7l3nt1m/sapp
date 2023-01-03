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
      color: black;
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
            <h3>Actualizando os dados de: {{$aluno->primeiro_nome}} {{$aluno->ultimo_nome}}</h3>
            <h6 class="font-weight-light" style="
            margin-top: 20px !important;
        ">Preencha os dados corretamente.</h6>
              <form class="pt-3" method="POST" action="/admin/update_aluno/{{$aluno->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" class="@error('primeiro nome') is-invalid @enderror" required value="{{$aluno->primeiro_nome}}" name="primeiro_nome" id="input-field" placeholder="Primeiro Nome" onkeyup="validate();">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" class="@error('ultimo nome') is-invalid @enderror" required value="{{$aluno->ultimo_nome}}" name="ultimo_nome" id="input-field2" placeholder="Ultimo Nome" onkeyup="validate();">
                          </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" class="@error('nome completo') is-invalid @enderror" required name="nome_completo" value="{{$aluno->nome_completo}}" id="input-field3" placeholder="Nome Completo" onkeyup="validate();">
                </div>

                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" class="@error('email') is-invalid @enderror" required id="exampleInputEmail1" value="{{$aluno->email}}" placeholder="Email">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" class="@error('O nome de usuario') is-invalid @enderror" required name="nome_de_usuario" id="input-field3" value="{{$aluno->nomeusuario}}" placeholder="Nome de usuário" title="username de inicio de sessão" onkeyup="validate();">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="date" name="data_de_nascimento" class="form-control form-control-lg" class="@error('data de nascimento') is-invalid @enderror" value="{{$aluno->data_nasc->format('Y-m-d')}}" required id="exampleInputEmail1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="file" id="image" name="image" class="form-control form-control-lg" class="@error('imagem') is-invalid @enderror" accept="image/*"
                                                onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo"  title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" name="processo" class="form-control form-control-lg" class="@error('numero de processo') is-invalid @enderror" required value="{{$aluno->n_processo}}" id="exampleInputEmail1" placeholder="Nº de Processo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" name="telefone" class="form-control form-control-lg" class="@error('telefone') is-invalid @enderror" required id="exampleInputEmail1" value="{{$aluno->telefone}}" placeholder="Telefone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <select class="form-control form-control-lg" required name="curso" id="exampleFormControlSelect2">
                          <option disabled selected>Curso</option>
                          <option value="informatica" {{$aluno->curso == 'informatica' ? 'selected=selected' : ''}}>Técnico de Informática</option>
                          <option value="multimedia" {{$aluno->curso == 'multimedia' ? 'selected=selected' : ''}}>Sistemas de Multimédia</option>
                          <option value="electronica" {{$aluno->curso == 'electronica' ? 'selected=selected' : ''}}>Electronica e Telecomunicações</option>
                        </select>
                    </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg" value="{{$aluno->turma}}" required name="turma" id="input-field7" placeholder="Turma" title="Turma" onkeyup="validate();">
                        </div>
                      </div>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                      <label for="">Previsualização da Imagem</label>
                      <img id="image-preview"
                      class="img-fluid img-thumbnail rounded d-block" width="400px" src="/img/alunos/{{$aluno->imagem_aluno}}">
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
