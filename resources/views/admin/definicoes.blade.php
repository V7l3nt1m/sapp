@extends('layouts.adminlayouts')

@section('boas_vindas')

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

<div class="background">
    <div class=" d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class=" mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h3>Definições do Administrador</h3>
            <h6 class="font-weight-light" style="
            margin-top: 20px !important;
        ">Preencha os dados corretamente.</h6>
              <form class="pt-3" method="POST" action="{{route('admin_defi_update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" class="@error('nomeusuario') is-invalid @enderror" required name="nomeusuario" value="{{$user->nomeusuario}}" id="input-field3" placeholder="Nome de usuário" data-bs-toggle="tooltip" title="Nome de usuário" data-bs-placement="right" data-bs-title="Tooltip on right">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" class="@error('email') is-invalid @enderror" required name="email" value="{{$user->email}}" id="input-field3" placeholder="Email" title="Email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" class="@error('password') is-invalid @enderror" required name="password" value="{{$user->password}}" id="input-field3" placeholder="Senha actual" title="Senha actual">
                </div>

               
                  


                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" >Confirmar</button>
                  </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>



@endsection

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
