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

<h2 style="text-align: center">Gerenciando Alunos do Sistema</h2>


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
                  <input type="button" class="btn bg-gradient-info btn-block" value="Cadastrar Aluno" style="width: 100%; height: 100%; background: #004d8b; color: white" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">
                </div>
            </li>
          </ul>
        </div>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Processo</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logado</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hora de Login</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hora de Logout</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ac????es  </th>
              </tr>
            </thead>
            <tbody>
              @foreach($alunos as $aluno)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="/img/alunos/{{$aluno->imagem_aluno}}" class="avatar avatar-sm me-3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <p class="mb-0 text-primary">{{$aluno->nome_completo}}</p>
                      <p class="text-xs text-secondary mb-0">{{$aluno->email}}</p>
                    </div>

                    <div class="d-flex flex-column justify-content-center" style="padding-left: 12px">
                      <p class="mb-0 text-primary">{{$aluno->turma}}</p>
                      <p class="text-xs text-secondary mb-0">{{$aluno->curso}}</p>
                    </div>

                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$aluno->n_processo}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  @if($aluno->estado == 1)
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
                  @if(DB::table('sessions')->where('user_id', $aluno->userid)->first())
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
                    {{$aluno->hora_login}}
                  </span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold"> {{$aluno->hora_logout}}</span>
                </td>
                
                <td class="align-middle text-center">
                    <button class="btn btn-sm bg-gradient-primary" type="button" id="dropdownMenuButton" style="background: #004d8b; color: white" data-bs-toggle="dropdown" aria-expanded="false">
                      Ac????es
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="/admin/edit_aluno/{{$aluno->id}}" style="color: #004d8b;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg> Actualizar
                    </a></li>
                      <li>
                        @if($aluno->estado == "1")
                        <form action="/admin/lock/{{$aluno->userid}}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn" style="width: 100%">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                              <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg> Bloquear
                          </button>
                        </form>
                        @else
                        <form action="/admin/unlock/{{$aluno->userid}}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn" style="width: 100%">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                              <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                            </svg> Desbloquear
                          </button>
                        </form>
                        @endif</li>

                      <li><form action="/admin/delete/aluno/{{$aluno->userid}}" method="POST">
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
<!-- Button trigger modal -->
  <!-- Button trigger modal -->
  

  <!-- Modal -->
  <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-info text-gradient">Cadastrar Alunos</h3>
              <br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Arquivo Excell</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Formul??rio</button>
                  </li>
                  
                </ul>

                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="d-flex align-items-center auth px-0">
                      <div class="row w-100 mx-0">
                        <div class="mx-auto">
                          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h6 class="font-weight-light" style="
                            margin-top: 20px !important;
                        ">Fa??a o upload de arquivo Excell com as seguintes tabelas:</h6>

              <div class="card card-blog card-plain">
                <div class="position-relative">
                  <a class="d-block blur-shadow-image">
                    <img src="/img/excell.png" alt="img-blur-shadow" class="img-fluid shadow">
                  </a>
                </div>
              
              </div>
              <br>
              <p>
                <i style="font-size: 15px">Obs: O campo email ?? opcional. Os titulos das colunas n??o devem constar no arquivo!</i>
              </p>

                                   
                                  
                                  <br>

                    <form action="{{route('cadasalunoexcell')}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('POST')
                      <input type="file" class="form-control" name="arquivo" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required data-bs-toggle="tooltip" data-bs-placement="top" title="Apenas arquivos Excell" data-container="body" data-animation="true">

                      <br>

                      <div class="row">
                        <div class="col-md-6">
                          <select class="form-control form-control-lg" required name="curso" id="exampleFormControlSelect2">
                            <option disabled selected>Curso</option>
                            <option value="informatica">T??cnico de Inform??tica</option>
                            <option value="multimedia">Sistemas de Multim??dia</option>
                            <option value="electronica">Electronica e Telecomunica????es</option>
                          </select>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="turma" required class="form-control form-control-lg" placeholder="Turma">
                        </div>
                      </div>

                      <br>
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Cadastrar</button>
                    </form>



                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>

                  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="d-flex align-items-center auth px-0">
                      <div class="row w-100 mx-0">
                        <div class="mx-auto">
                          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h6 class="font-weight-light" style="
                            margin-top: 10px !important;
                        ">Preencha os dados corretamente.</h6>
                              <form class="pt-3" method="POST" action="{{route('store_alunos')}}" enctype="multipart/form-data">
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
                
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-lg" class="@error('nomeusuario') is-invalid @enderror" required name="nome_de_usuario" id="input-field3" placeholder="Nome de usu??rio" title="username de inicio de sess??o">
                                </div>
                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" name="data_de_nascimento" class="form-control form-control-lg" class="@error('data de nascimento') is-invalid @enderror" required id="exampleInputEmail1">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="processo" class="form-control form-control-lg" class="@error('numero de processo') is-invalid @enderror" required id="exampleInputEmail1" placeholder="N?? de Processo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="telefone" class="form-control form-control-lg" class="@error('telefone') is-invalid @enderror" required id="exampleInputEmail1" placeholder="Telefone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <select class="form-control form-control-lg" required name="curso" id="exampleFormControlSelect2">
                                          <option disabled selected>Curso</option>
                                          <option value="informatica">T??cnico de Inform??tica</option>
                                          <option value="multimedia">Sistemas de Multim??dia</option>
                                          <option value="electronica">Electronica e Telecomunica????es</option>
                                        </select>
                                    </div>
                
                                        <div class="col-md-6">
                                         <div class="form-group">
                                          <input type="text" class="form-control form-control-lg" required name="turma" placeholder="Turma" title="Turma" onkeyup="validate();">
                                        </div>
                                        </div>

                                        <div class="form-group">
                                          <input type="file" id="image" name="image" class="form-control form-control-lg" class="@error('imagem') is-invalid @enderror" accept="image/*"
                                                              onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo"  required="required" data-bs-toggle="tooltip" data-bs-placement="top" title="Foto meio corpo" data-container="body" data-animation="true">
                                        </div>
                                </div>
                                <br>
                
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5">
                                      <label for="">Previsualiza????o da Imagem</label>
                                      <img id="image-preview"
                                      class="img-fluid img-thumbnail rounded d-block" width="600px">
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


                  </div>
                </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>



@endsection