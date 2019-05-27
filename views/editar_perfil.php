<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Perfil</title>
    <?php
    include_once 'common/head.php';
    include_once 'common/nav.php';
    ?>
    <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script>
</head>
<body>
<br>

<div class="container col-md-4">
    <h3 class="text-center info-title text-dark" style="w">
        EDITAR PERFIL
        <br><br>
    </h3>
    <!-- Default checked -->

<form id="form-ePerfil"  action="async/editar_perfil.php" method="POST" enctype="multipart/form-data" >
    <div class="togglebutton">
        <label CLASS="text-dark">
            <input type="checkbox" id="mi_caja" name="mi_caja" checked="checked">
            <span class="toggle"></span>
            INHABILITAR CUENTA
        </label>
    </div>
    <div class="form-group">

        <label  class="info-title text-dark">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre"  autocomplete="off" value="<?php echo UserSesion::getNombre(); ?>" >

    </div>
    <div class="form-group">
        <label  class="text-dark info-title">Password</label>
        <input type="password" class="form-control" id="pass" name="pass" autocomplete="off" placeholder="Password">
    </div>

    <div>
        <label for="fileField"></label>
        <input type="file" name="perfil" id="fileField" accept="image/*">
    </div>


    <button type="submit" class="btn btn-primary" name="editar">Editar</button>
</form>

</div>
<script src="public/js/jquery-3.3.1.min.js"></script>
<script>



   $('#mi_caja').change(()=>{
       if(!$('#mi_caja').is(':checked')) {
           swal({
               title: "Seguro que quiere inhabilitarla?",
               icon: "danger",
           }).then(() => {

           });
       }
   });


</script>



</body>
</html>
