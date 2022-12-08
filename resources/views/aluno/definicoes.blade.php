@extends('layouts.alunolayout')

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

    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class=" mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h4>Alterar Definições</h4>
              <h6 class="font-weight-light" style="
              margin-top: 20px !important;
          ">Preencha os dados corretamente.</h6>
              <form class="pt-3" method="POST" action="/aluno/update/{{$aluno->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg"  value="{{$aluno->email}}"  required id="exampleInputEmail1" placeholder="Email">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" value="{{$aluno->palavra_passe}}" name="palavra_passe1" class="form-control form-control-lg" required id="exampleInputEmail1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" value="{{$aluno->palavra_passe}}" name="palavra_passe2" class="form-control form-control-lg" required id="exampleInputEmail1">
                        </div>
                    </div>
                </div>

                

                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Actualizar</button>
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
@endsection
