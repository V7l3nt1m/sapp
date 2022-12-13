<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Definições
              </a>
              <form action="/logout" method="POST">
                @csrf
                <a href="/logout" class="dropdown-item"  onclick="event.preventDefault();
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
            <a class="nav-link" href="">
              <i class="icon-grid menu-icon text-white"></i>
              <span class="menu-title">Administrador</span>
            </a>
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
            <p class="h5">Olá, Sr. Valentim Prado</p><br>
          </div>
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


            <div class="table-responsive">
              <table class="table table-hover">
                    <thead>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Permissao</th>
                      <th>Estado da Conta</th>
                      <th>Logado</th>
                      <th>Acções</th>
                    </thead>
                    <tbody>
                      @foreach ($usuarios as $users)
                        <tr>
                          <td>{{$loop->index+1}}</td>
                          <td>{{$users->name}}</td>
                          <td>{{$users->email}}</td>
                          <td>{{$users->permissao}}</td>
                          @if($users->estado == 1)
                          <td>Activo</td>
                          @else
                          <td>Bloqueado</td>
                          @endif
                          @if(count(DB::table('sessions')->where('user_id', $users->id)->get()) == 1)
                          <td>Logado</td>
                          @else
                          <td>Deslogado</td>
                          @endif
                          <td>
                            <div class="row">
                              @if($users->estado == 1)
                              <form action="/admin/lock/{{$users->id}}" method="POST">
                                @csrf
                                @method('PUT')
                              <button type="submit" class="btn btn-info btn-rounded btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                </svg>
                              </button>
                            </form>
                                @else
                                <form action="/admin/unlock/{{$users->id}}" method="POST">
                                  @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info btn-rounded btn-icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                                  </svg>
                                </button>
                                </form>

                                @endif
                                <form action="/admin/delete/{{$users->id}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill text-white" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                  </svg>
                                                  </button>
                                </form>
                          </div>
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
              </table>
            </div>







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
  <!-- End custom js for this page-->
</body>

</html>

