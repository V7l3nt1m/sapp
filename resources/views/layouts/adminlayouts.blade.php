<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard - SAPP</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="/template/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  
  <!-- inject:css -->
  <link rel="stylesheet" href="/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/template/img/itel_logo_sapp.png" />
  <style>
    
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/"><img src="/template/img/itel_logo_sapp.png" class="mr-2" alt="logo"/><span class="h3">SAPP</span></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="/template/img/itel_logo_sapp.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              <span class="input-group-text" id="search">
                <i class="icon-search"></i>
              </span>
              <form method="GET">
                <input type="text" class="form-control" id="navbar-search-input" name="search"  placeholder="Search now" aria-label="search" aria-describedby="search">
              </form>
            </div>
          </div>
        </li>
      </ul>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="/template/#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notificações</p>
              <a class="dropdown-item preview-item">

                <div class="preview-item-content">
                  <p class="font-weight-light small-text mb-0 text-muted" style="color: #121212 !important;">
                    Sem notificações
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item">{{$user->name}}</li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="/template/#" data-toggle="dropdown" id="profileDropdown">
              <img src="/template/images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a  class="dropdown-item" href="{{route('admin_definicoes')}}"><i class="ti-settings text-primary"></i> Definições</a>
              
              <form action="/logout" method="POST">
                @csrf
                <a href="/logout" class="dropdown-item" onclick="event.preventDefault();
                this.closest('form').submit();"><i class="ti-power-off text-primary"></i>Terminar Sessão</a>
            </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item bg-primary dash">
            <a class="nav-link" href="{{route('voltaradmin')}} ">
              <i class="icon-grid menu-icon text-white"></i>
              <span class="menu-title">Administrador</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts_aluno" aria-expanded="false" aria-controls="charts_aluno">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Alunos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts_aluno">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{route('addaluno')}}">Adicionar</a></li>



                <li class="nav-item"> <a class="nav-link" href="{{route('gerenaluno')}}">Gerenciar</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts_professor" aria-expanded="false" aria-controls="charts_professor">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Professores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts_professor">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{route('addprofessor')}}">Adicionar</a></li>



                <li class="nav-item"> <a class="nav-link" href="{{route('gerenprofessor')}}">Gerenciar</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts_orientador" aria-expanded="false" aria-controls="charts_orientador">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Orientadores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts_orientador">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{route('gerenorientador')}}">Gerenciar</a></li>
              </ul>
            </div>
          </li>

       <!--   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts_coordenador" aria-expanded="false" aria-controls="charts_coordenador">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Coordenadores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts_coordenador">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{route('addcordenador')}}">Adicionar</a></li>



                <li class="nav-item"> <a class="nav-link" href="">Gerenciar</a></li>
              </ul>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts_ad" aria-expanded="false" aria-controls="charts_ad">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Admininstradores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts_ad">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{route('addadminoutro')}}">Adicionar</a></li>



                <li class="nav-item"> <a class="nav-link" href="{{route('admin_gerenciar_admin')}}">Gerenciar</a></li>
              </ul>
            </div>
          </li>






        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h6 class="font-weight-normal mb-0"><span class="text-primary"></span></h6>
                </div>

              </div>
            </div>
          </div>

          <div class="" style="margin-top: -30px;">
            <h3>Painel administrativo do SAPP</h3><br>


           @yield('boas_vindas')
          </div>

@yield('section')







         </div>
         </div>
         </div>
         </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">SAPP - Sistema de Auxílio de Projectos da PAP</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-white">ITEL PAP 2022</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="/template/vendors/chart.js/Chart.min.js"></script>
  <script src="/template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="/template/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/template/js/off-canvas.js"></script>
  <script src="/template/js/hoverable-collapse.js"></script>
  <script src="/template/js/template.js"></script>
  <script src="/template/js/settings.js"></script>
  <script src="/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/template/js/dashboard.js"></script>
  <script src="/template/js/Chart.roundedBarCharts.js"></script>
  
  <script>
    function validate() {
    var element = document.getElementById('input-field');
    element.value = element.value.replace(/[^a-zA-Zà-úÀ-Úã-õÃ-Õ ]+/, '');

    var element2 = document.getElementById('input-field2');
    element2.value = element2.value.replace(/[^a-zA-Zà-úÀ-Úã-õÃ-Õ ]+/, '');

    var element3 = document.getElementById('input-field3');
    element3.value = element3.value.replace(/[^a-zA-Zà-úÀ-Úã-õÃ-Õ ]+/, '');
    var element4 = document.getElementById('input-field4');
    element4.value = element4.value.replace(/[^a-zA-Zà-úÀ-Úã-õÃ-Õ ]+/, '');
    };


    </script>
  <!-- End custom js for this page-->
</body>

</html>

