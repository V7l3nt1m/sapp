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
    @endif
    <div class="background">
          <div class=" d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
              <div class=" mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <h4>Crie Uma Sala</h4>
                  <h6 class="font-weight-light" style="
                  margin-top: 20px !important;
              ">Preencha os dados corretamente.</h6>
                  <form class="pt-3" method="POST" action="/cadastro/professor/sala_criar">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" class="@error('turma') is-invalid @enderror" required name="turma" id="exampleInputUsername1" placeholder="Turma">
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control form-control-lg" class="@error('curso') is-invalid @enderror" required name="curso" id="exampleFormControlSelect2">
                                    <option disabled selected>Curso</option>
                                    <option value="informatica">Técnico de Informática</option>
                                    <option value="multimedia">Sistemas de Multimédia</option>
                                    <option value="electronica">Electronica e Telecomunicações</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" class="@error('id_sala') is-invalid @enderror" required name="id_sala" id="exampleInputUsername1" placeholder="ID da Sala">
                    </div>
                    <div class="form-group">
                      <input type="password" name="senha" class="form-control form-control-lg" class="@error('senha') is-invalid @enderror" required id="exampleInputEmail1" placeholder="Senha">
                    </div>
                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Criar Sala</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          </div>

      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->



@endsection
