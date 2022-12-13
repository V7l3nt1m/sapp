<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registrar - SAPP</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/template/img/itel_logo_sapp.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class=" mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="/template/img/itel_logo_sapp.png" alt="logo">
              </div>
              <h4>Seja Bem-vindo ao SAPP!</h4>
              <h6 class="font-weight-light" style="
              margin-top: 20px !important;
          ">Preencha os dados corretamente.</h6>
           @if (count($errors) > 0)
           <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
              <form class="pt-3" method="POST" action="/cadastro/aluno" enctype="multipart/form-data">
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
                </div>

                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Criar conta</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Já tem uma conta? <a href="/login" class="text-primary">Inicie sessão.</a>
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

  <script src="/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/template/js/off-canvas.js"></script>
  <script src="/template/js/hoverable-collapse.js"></script>
  <script src="/template/js/template.js"></script>
  <script src="/template/js/settings.js"></script>
  <script src="/template/js/todolist.js"></script>
  <!-- endinject -->

  <script>
    function validate() {
    var element = document.getElementById('input-field');
    element.value = element.value.replace(/[^a-zA-Zà-úÀ-Úã-õÃ-Õ ]+/, '');

    var element2 = document.getElementById('input-field2');
    element2.value = element2.value.replace(/[^a-zA-Zà-úÀ-Úã-õÃ-Õ ]+/, '');

    var element3 = document.getElementById('input-field3');
    element3.value = element3.value.replace(/[^a-zA-Zà-úÀ-Úã-õÃ-Õ ]+/, '');

    };


    </script>

    <script>
     function isImagem(i){

       var img = i.value.split(".");
       var ext = "."+img.pop();

       if(!ext.match(/\.(gif|jpg|jpeg|tiff|png)$/i)){
          alert("Não é imagem");
          i.value = '';
          return;
       }
    }

    </script>

</body>

</html>
