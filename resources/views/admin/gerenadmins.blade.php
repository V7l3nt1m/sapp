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
      color: #155724;
      font-style: italic;
      margin-bottom: 0;
      padding: 10px;">
        {{session('erro')}}
      </h1>
@endif

<h2 style="text-align: center">Gerenciando Administradores do Sistema</h2>



<div class="container-fluid">
  <div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto my-auto">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <form action="" method="get">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here..." name="search">
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                    <input type="button" class="btn bg-gradient-info btn-block" value="Cadastrar Administrador" style="width: 100%; height: 100%; background: #004d8b; color: white"  data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">
                  </div>
              </li>
            </ul>
          </div>
        </div>
    </div>
  </div>
  </div>
  
  <div class="container-fluid" style="padding-bottom: 40px">
    <div class="card shadow-lg mx-4 card-profile-bottom">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome / Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logado</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hora de Login</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hora de Logout</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acções  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($admins as $admin)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="/img/admins/{{$admin->imagem_admin}}" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <p class="mb-0 text-primary">{{$admin->nome}}</p>
                        <p class="text-xs text-secondary mb-0">{{$admin->email}}</p>
                      </div>

  
                    </div>
                  </td>
                 
                  <td class="align-middle text-center text-sm">
                    @if($admin->estado == 1)
                    <span class="badge bg-gradient-success">
                      Activa
                    </span>
                      @else
                      <span class="badge bg-gradient-danger">
                      Bloqueada
                    </span>
                      @endif
                  </td>
  
                  <td class="align-middle text-center text-sm">
                    @if(DB::table('sessions')->where('user_id', $admin->userid)->first())
                    <span class="badge bg-gradient-success">
                      Logado
                    </span>
                      @else
                      <span class="badge bg-gradient-warning">
                      Deslogado
                    </span>
                      @endif
                  </td>
  
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">
                      {{$admin->hora_login}}
                    </span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> {{$admin->hora_logout}}</span>
                  </td>
                  
                  <td class="align-middle text-center">
                      <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background: #004d8b; color: white">
                        Acções
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/admin/edit_admin/{{$admin->id}}" style="color: #004d8b;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg> Actualizar
                      </a></li>
                        <li>
                          @if($admin->estado == "1")
                          <form action="/admin/lock/{{$admin->userid}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn" style="width: 100%">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                              </svg> Bloquear
                            </button>
                          </form>
                          @else
                          <form action="/admin/unlock/{{$admin->userid}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn" style="width: 100%">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                              </svg> Desbloquear
                            </button>
                          </form>
                          @endif</li>
  
                        <li>
                          <form action="/admin/delete/admins/{{$admin->userid}}" method="POST">
                            @csrf
                          @method('DELETE')
                          <button type="submit" class="btn"  style="width: 100%; color:#004d8b;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg> Eliminar
                          </button>
                        </form></li>
                      </ul>
                  </td>
                </tr>
  
                @endforeach
              </tbody>
              
            </table>
        
  
      </div>
    </div>
    </div>
  
      <!-- Modal -->
      <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-body pb-3">
                  <div class="background">
                    <div class=" d-flex align-items-center auth px-0">
                      <div class="row w-100 mx-0">
                        <div class=" mx-auto">
                          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h3>Cadastre outros Administradores</h3>
                            <h6 class="font-weight-light">Preencha os dados corretamente.</h6>
                              <form class="pt-3" method="POST" action="{{route('admin_cadastro_admin')}}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" class="@error('nome completo') is-invalid @enderror" required name="nome_completo" id="input-field" placeholder="Nome Completo" onkeyup="validate();">
                                </div>
                
                                <div class="form-group">
                                  <input type="email" name="email" class="form-control form-control-lg" class="@error('email') is-invalid @enderror" required id="exampleInputEmail1" placeholder="Email">
                                </div>
                
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-lg" class="@error('nome de usuario') is-invalid @enderror" required name="nome_de_usuario" id="input-field3" placeholder="Nome de usuário" title="username de inicio de sessão" onkeyup="validate();">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <select name="genero" required class="form-control form-control-lg">
                                          <option value="" disabled selected>Genero</option>
                                          <option value="masculino">Masculino</option>
                                          <option value="feminino">Feminino</option>
                                        </select>
                                      </div>
                                  </div>
                                </div>
                                       
                                  
                                        <div class="form-group">
                                          <input type="file" id="image" name="image" class="form-control form-control-lg" class="@error('imagem') is-invalid @enderror" accept="image/*"
                                                              onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo"  required="required" title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
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

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection