@extends('layouts.professorlayout')

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
                <h4>Alterar Definições</h4>
                <h6 class="font-weight-light" style="
                margin-top: 20px !important;
            ">Preencha os dados corretamente.</h6>
                <form class="pt-3" method="POST" action="/cadastro/professor/{{$professor->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" required name="primeiro_nome" id="exampleInputUsername1" placeholder="Primeiro Nome" value="{{$professor->primeiro_nome}}">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" required name="ultimo_nome" id="exampleInputUsername1" placeholder="Ultimo Nome" value="{{$professor->ultimo_nome}}">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" required name="nome_completo" id="exampleInputUsername1" placeholder="Nome Completo" value="{{$professor->nome_completo}}">
                    </div>

                    <div class="form-group">
                      <input type="email" value="{{$professor->email}}" name="email" class="form-control form-control-lg" required id="exampleInputEmail1" placeholder="Email">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" name="data_nasc" class="form-control form-control-lg" required id="exampleInputEmail1" value="{{$professor->data_nasc->format('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="file" id="image" name="image" class="form-control btn form-control required-lg" accept="image/*"
                        onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo" title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
                        </div>
                    </div>

                            <div class="form-group">
                                <input type="number" value="{{$professor->telefone}}" name="telefone" class="form-control form-control-lg" required id="exampleInputEmail1" placeholder="Telefone">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" value="{{$professor->palavra_passe}}" name="palavra_passe1" class="form-control form-control-lg" required id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" value="{{$professor->palavra_passe}}" name="palavra_passe2" class="form-control form-control-lg" required id="exampleInputEmail1">
                                    </div>
                                </div>
                            </div>



                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5">
                          <label for="">Previsualização da Imagem</label>
                          <img id="image-preview"
                          class="img-fluid img-thumbnail rounded d-block" src="/img/professores/{{$professor->imagem_professor}}" width="400px">
                        </div>
                        <div class="col-md-3"></div>
                      </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Actualizar</button>
                      </div>

                  </form>
              </div>
            </div>
          </div>
        </div>
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
