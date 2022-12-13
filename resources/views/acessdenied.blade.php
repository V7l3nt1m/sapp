<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Acesso Negado</title>
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
              <h4 style="text-align: center; font-size: 70px">Whoops! Acesso Negado</h4>
              <br>
              <br>
              <h4 style="text-align:center">Parece que foi bloqueado pelo administrador ou não tem <br>
                <br>
          permissão para acessar está pagina</h4>
                <br>
                <img src="/template/img/cadeado.png" class="img-fluid" style="display: block; margin: auto; width: 100px" alt="cadeado">

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
