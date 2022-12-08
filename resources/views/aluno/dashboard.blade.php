@extends('layouts.alunolayout')

@section('content')
<div class="" style="margin-top: -30px;">
    <h3>Olá, ITELITA</h3><br>
    <p class="h5">Quais avanços daremos no Projecto hoje?</p><br>
  </div>
  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-0">Bloco de Notas</p><br>
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <tbody>
                <tr>
                  <td>Lista dos módulos do Projecto...</td>
                  <td>12 Jan. 2022</td>
                  <td class="font-weight-medium"><div class="badge badge-primary">Consultar</div></td>
                </tr>
                <tr>
                  <td>Lista dos módulos do Projecto...</td>
                  <td>12 Jan. 2022</td>
                  <td class="font-weight-medium"><div class="badge badge-primary">Consultar</div></td>
                </tr>
                <tr>
                  <td>Lista dos módulos do Projecto...</td>
                  <td>12 Jan. 2022</td>
                  <td class="font-weight-medium"><div class="badge badge-primary">Consultar</div></td>
                </tr>
                <tr>
                  <td>Lista dos módulos do Projecto...</td>
                  <td>12 Jan. 2022</td>
                  <td class="font-weight-medium"><div class="badge badge-primary">Consultar</div></td>
                </tr>
                <tr>
                  <td>Lista dos módulos do Projecto...</td>
                  <td>12 Jan. 2022</td>
                  <td class="font-weight-medium"><div class="badge badge-primary">Consultar</div></td>
                </tr>
                <tr>
                  <td>Lista dos módulos do Projecto...</td>
                  <td>12 Jan. 2022</td>
                  <td class="font-weight-medium"><div class="badge badge-primary">Consultar</div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lista de tarefas</h4>
          <p>Faça marcações do que deves fazer e mantém-te focado.</p>
                            <div class="list-wrapper pt-2">
                                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Criar repositório no Git
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" checked>
                                                Aprender Flutter
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Programar o Front-End em Flutter
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox">
                                                Programar o Back-end com Laravel
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
              <li class="completed">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" checked>
                                                Estudar Laravel
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                </ul>
          </div>
          <div class="add-items d-flex mb-0 mt-2">
                                <input type="text" class="form-control todo-list-input"  placeholder="Adicione um novo objectivo" style="padding: 20px;">
                                <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
                            </div>
                        </div>
                    </div>
    </div>
  </div>

@endsection
