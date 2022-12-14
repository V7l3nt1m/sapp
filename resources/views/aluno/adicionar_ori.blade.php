@extends('layouts.alunolayout')

@section('content')

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
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class=" mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Cadastre o seu orientador</h4>
              <h6 class="font-weight-light" style="
              margin-top: 20px !important;
          ">Preencha os dados corretamente.</h6>
              <form class="pt-3" method="POST" action="/aluno/cadastro/orientador" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" class="@error('primeiro nome') is-invalid @enderror" required name="primeiro_nome" id="input-field" placeholder="Primeiro Nome"  onkeyup="validate();">
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
                  <input type="text" class="form-control form-control-lg" class="@error('nomeusuario') is-invalid @enderror" required name="nome_user" id="input-field3" placeholder="Nome de usu??rio" title="username de inicio de sess??o" onkeyup="validate();">
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="telefone" class="form-control form-control-lg" class="@error('telefone') is-invalid @enderror" required id="exampleInputEmail1" placeholder="Telefone">
                    </div>
                </div>
                    <div class="col-md-6">
                        <input type="file" id="image" name="image" class="form-control btn form-control required-lg" class="@error('image') is-invalid @enderror" accept="image/*"
                    onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo"  required="required" title="Fa??a o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
                    </div>
                </div>



                                <div class="form-group">
                                    <input type="text" name="cadeira" id="input-field4" class="form-control form-control-lg" class="@error('cadeira') is-invalid @enderror" placeholder="Cadeira" onkeyup="validate();">
                                </div>



                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                      <label for="">Previsualiza????o da Imagem</label>
                      <img id="image-preview"
                      class="img-fluid img-thumbnail rounded d-block" width="400px">
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                </div>

                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Cadastrar Orientador</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

  <script>
    function validate() {
    var element = document.getElementById('input-field');
    element.value = element.value.replace(/[^a-zA-Z??-????-????-????-?? ]+/, '');

    var element2 = document.getElementById('input-field2');
    element2.value = element2.value.replace(/[^a-zA-Z??-????-????-????-?? ]+/, '');

    var element3 = document.getElementById('input-field3');
    element3.value = element3.value.replace(/[^a-zA-Z??-????-????-????-?? ]+/, '');
    var element4 = document.getElementById('input-field4');
    element4.value = element4.value.replace(/[^a-zA-Z??-????-????-????-?? ]+/, '');
    };


    </script>

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
