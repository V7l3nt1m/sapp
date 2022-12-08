<x-guest-layout>
        <x-slot name="logo">
        </x-slot>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - SAPP</title>
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
  <style>
    li{
        color: red;
    }
  </style>
</head>

<body>
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
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="/template/img/itel_logo_sapp.png" alt="logo">
              </div>
              <h4>Bem-vindo de volta ao SAPP.</h4>

              <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                <p style="color: red">{{ session('status') }}</p>
            </div>
        @endif

              <form class="pt-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <input id="processo" class="form-control form-control-lg" type="text" placeholder="Nº de processo ou Email" name="processo_email" required autofocus>
                </div>
                <div class="form-group">
                  <input id="password" class="form-control form-control-lg" type="password" name="password" placeholder="Palavra-Passe" required autocomplete="current-password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" >Entrar</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">

                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Esqueceu-se da password?</a>
                </div>
                <div class="text-center mt-3 font-weight-light">
                  Ainda não tem uma conta? <a href="/escolha" class="text-primary">Cadastro</a>
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
</body>

</html>
</x-guest-layout>
