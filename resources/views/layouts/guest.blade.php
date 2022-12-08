<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ITEL</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/page2/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="/page2/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/page2/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/page2/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/page1/assets/img/itel_logo_sapp.png" type="image/x-icon">
    </head>
    <body>

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>



        <script src="/page2/template/vendors/js/vendor.bundle.base.js"></script>
    <script src="/page2/template/js/off-canvas.js"></script>
    <script src="/page2/template/js/hoverable-collapse.js"></script>
    <script src="/page2/template/js/template.js"></script>
    <script src="/page2/template/js/settings.js"></script>
    <script src="/page2/template/js/todolist.js"></script>
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
    <script>
        function isImagem(i){

          var img = i.value.split(".");
          var ext = "."+img.pop();

          if(!ext.match(/\.(gif|jpg|jpeg|tiff|png)$/i)){
             alert("Não é imagem");
             i.value = '';
             return;
          }
       }

       </script>
    </body>
</html>
