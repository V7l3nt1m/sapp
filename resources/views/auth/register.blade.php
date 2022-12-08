<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf
            <div class="container-scroller">
                <div class="container-fluid page-body-wrapper full-page-wrapper">
                  <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                      <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                          <div class="brand-logo">
                            <img src="/page1/assets/img/itel_logo_sapp.png" alt="logo">
                          </div>
                          <h4>Novo Aluno</h4>
                          <h6 class="font-weight-light"></h6>

                            <div class="form-group">
                    <x-jet-input id="processo" placeholder="Nº de Processo" class="form-control form-control-lg" type="number" name="processo" :value="old('processo')" required />
                            </div>

                            <div class="form-group">
                                <x-jet-input placeholder="Primeiro Nome"  id="primeiro_nome" class="form-control form-control-lg" type="text" name="primeiro_nome" :value="old('primeiro_nome')" required />
                            </div>

                            <div class="form-group">
                        <x-jet-input id="ultimo_nome" class="form-control form-control-lg" placeholder="Último Nome" type="text" name="ultimo_nome" :value="old('ultimo_nome')" required />
                            </div>

                            <div class="form-group">
                                <x-jet-input id="nome_completo" class="form-control form-control-lg" placeholder="Nome Completo" type="text" name="nome_completo" :value="old('nome_completo')" required />
                            </div>

                            <div class="mb-4">
                              <div class="form-group">
                                <x-jet-input id="data_nasc" class="form-control form-control-lg" type="date" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Data de Nascimento" title="Data de Nascimento" name="data_nasc" :value="old('data_nasc')" required />
                              </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-group">
                                    <x-jet-input id="email" class="form-control form-control-lg" placeholder="Email" type="email" name="email" :value="old('email')" required />
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="form-group">
                                <x-jet-input id="telefone" class="form-control form-control-lg" placeholder="Telefone"  type="number" name="telefone" :value="old('telefone')" required />
                                </div>
                            </div>
                            <div class="mt-4">
                                <select name="curso" id="curso" class="form-control form-control-lg">
                                    <option value="" selected disabled>Curso</option>
                                    <option value="Informatica">Informática</option>
                                    <option value="Electronica">Electrónica</option>
                                    <option value="Multimedia">Multimédia</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <div class="form-group">
                                        <label>Carregar foto</label>
                                        <input type="file" name="c" class="form-control" accept="image/*"
                    onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  required="required"title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip" data-placement="top" >

                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-5">
                                      <label for="">Previsualização da Imagem</label>
                                      <img id="image-preview"
                                      class="img-fluid img-thumbnail rounded mx-auto d-block" alt="placeholder">
                                        </div>
                                        <div class="col-md-3"></div>
                                      </div>

                            <div class="mt-3">

                              <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">CADASTRAR</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                              Já possui uma conta <a href="/login" class="text-primary">Login</a>
                            </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- content-wrapper ends -->
                </div>
                <!-- page-body-wrapper ends -->
              </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
