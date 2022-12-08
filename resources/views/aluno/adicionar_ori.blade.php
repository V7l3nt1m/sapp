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
                            <input type="text" class="form-control form-control-lg" required name="primeiro_nome" id="exampleInputUsername1" placeholder="Primeiro Nome">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" required name="ultimo_nome" id="exampleInputUsername1" placeholder="Ultimo Nome">
                          </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" required name="nome_completo" id="exampleInputUsername1" placeholder="Nome Completo">
                </div>

                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" required id="exampleInputEmail1" placeholder="Email">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="date" name="data_nasc" class="form-control form-control-lg" required id="exampleInputEmail1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="file" id="image" name="image" class="form-control btn form-control required-lg" accept="image/*"
                    onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo"  required="required" title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
                    </div>
                </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="telefone" class="form-control form-control-lg" required id="exampleInputEmail1" placeholder="Telefone">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="cadeira" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Cadeira">
                                </div>
                            </div>

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
